<?php

namespace App\controllers;

use App\models\AnimalModel;
use App\models\HabitatModel;
use App\models\RaceModel;
use App\config\CloudinaryService;

class AnimalDashboardController extends DashboardController
{
    /**
     * Displays a list of all animals in the dashboard.
     *
     * Fetches all animals with their race and habitat details from the AnimalModel,
     * and passes them to the dashboard view for rendering.
     *
     * @return void
     */
    public function listAnimals()
    {
        $animalModel = new AnimalModel();
        $animals = $animalModel->getAllAnimalsWithDetails();

        if (isset($_SESSION['id'])) {
            // Render the 'list_animals' section in the dashboard view with the list of animals
            $this->render('dashboard/index', [
                'section' => 'list_animals',
                'animals' => $animals
            ]);
        } else {
            http_response_code(404);
        }
    }

    /**
     * Handles the addition of a new animal to the system.
     *
     * Processes a POST request to add a new animal by collecting form data such as name, age, description, "Did You Know" facts,
     * and by uploading an associated image. It verifies the existence of related foreign keys (`Race` and `Habitat`), uploads 
     * the animal image to Cloudinary, and saves the new animal record to the database.
     *
     * - Validates `Race` and `Habitat` IDs to ensure they exist in the database.
     * - Handles image upload and stores the resulting URL as part of the animal record.
     * - Uses different methods from `AnimalModel` to manage data insertion.
     *
     * @return void Outputs the rendered view or redirects the user after processing.
     */
    public function addAnimal()
    {
        $animalModel = new AnimalModel();
        $raceModel = new RaceModel();
        $habitatModel = new HabitatModel();
        $cloudinaryService = new CloudinaryService();

        // Retrieve races and habitats for dropdown lists
        $races = $raceModel->selectAll();
        $habitats = $habitatModel->selectAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $age = $_POST['age'];
            $description = $_POST['description'];
            $dyk = $_POST['dyk'];
            $id_race = $_POST['id_race'];
            $id_habitat = $_POST['id_habitat'];

            // Handle image upload
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $image = $_FILES['image'];

                // Check file type
                $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
                if (in_array($image['type'], $allowedTypes)) {
                    // Upload the image to Cloudinary
                    $fileUrl = $cloudinaryService->uploadFile($image['tmp_name']);
                    if ($fileUrl) {
                        // Use the image URL as the slug
                        $slug = $fileUrl;

                        // Insert the animal into the database
                        if ($animalModel->addAnimal($name, $age, $slug, $description, $dyk, $id_race, $id_habitat)) {
                            header('Location: /animalDashboard/listAnimals'); // Redirect to the animal list after adding
                            exit();
                        } else {
                            $error = "Error adding the animal.";
                        }
                    } else {
                        $error = "Error uploading the image to Cloudinary.";
                    }
                } else {
                    $error = "File type not allowed. Only JPEG, PNG, WEBP and GIF files are allowed.";
                }
            } else {
                $error = "Please select an image (max 10MB) to upload.";
            }
        }

        if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
            // Display the view to add an animal
            $this->render('dashboard/index', [
                'section' => 'add_animal',
                'races' => $races,
                'habitats' => $habitats,
                'error' => $error ?? null
            ]);
        } else {
            http_response_code(404);
        }
    }

    /**
     * Edits an existing animal by its ID.
     *
     * Handles the POST request to update an animal's information,
     * including optional image replacement using Cloudinary.
     *
     * @param integer $id The ID of the animal to edit.
     * @return void
     */
    public function editAnimal($id)
    {
        $animalModel = new AnimalModel();
        $raceModel = new RaceModel();
        $habitatModel = new HabitatModel();
        $cloudinaryService = new CloudinaryService();

        // Retrieve animal, race, and habitat data
        $animal = $animalModel->getAnimalById($id);
        $races = $raceModel->selectAll();
        $habitats = $habitatModel->selectAll();

        if ($_POST) {
            // Update the animal with new data from the form
            $animalModel->hydrate($_POST);

            // Handle new image upload if provided
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $image = $_FILES['image'];

                // Check file type
                $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
                if (in_array($image['type'], $allowedTypes)) {
                    // Delete the old image from Cloudinary if it exists
                    if ($animal->slug) {
                        $publicId = basename(parse_url($animal->slug, PHP_URL_PATH), '.' . pathinfo($animal->slug, PATHINFO_EXTENSION));
                        $cloudinaryService->deleteFile('habitats/' . $publicId);
                    }

                    // Upload new image to Cloudinary
                    $fileUrl = $cloudinaryService->uploadFile($image['tmp_name']);
                    if ($fileUrl) {
                        // Update slug with new image URL
                        $animalModel->setSlug($fileUrl);
                    } else {
                        $error = "Error uploading the new image to Cloudinary.";
                    }
                } else {
                    $error = "File type not allowed.";
                }
            }

            // Update the animal in the database
            if ($animalModel->update($id)) {
                header('Location: /animalDashboard/listAnimals');
                exit();
            } else {
                $error = "Error updating the animal.";
            }
        }

        if (isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')) {
            // Render the 'edit_animal' section in the dashboard view with animal data
            $this->render('dashboard/index', [
                'section' => 'edit_animal',
                'animal' => $animal,
                'races' => $races,
                'habitats' => $habitats,
                'error' => $error ?? null
            ]);
        } else {
            http_response_code(404);
        }
    }

    /**
     * Deletes an animal by its ID.
     *
     * Deletes the associated image from Cloudinary before deleting the animal entry from the database.
     *
     * @param integer $id The ID of the animal to delete.
     * @return void
     */
    public function deleteAnimal($id)
    {
        $animalModel = new AnimalModel();
        $animal = $animalModel->getAnimalById($id);
        $cloudinaryService = new CloudinaryService();

        if ($animal) {
            // Delete the associated image from Cloudinary if it exists
            if ($animal->slug) {
                $publicId = basename(parse_url($animal->slug, PHP_URL_PATH), '.' . pathinfo($animal->slug, PATHINFO_EXTENSION));
                $cloudinaryService->deleteFile('habitats/' . $publicId);
            }

            // Delete the animal from the database
            if ($animalModel->delete($id)) {
                header('Location: /animalDashboard/listAnimals');
                exit();
            } else {
                $error = "Error deleting the animal.";
            }
        } else {
            $error = "Animal not found.";
        }

        if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
            // Render the animal list with an error message if necessary
            $this->render('dashboard/index', [
                'section' => 'list_animals',
                'error' => $error ?? null
            ]);
        } else {
            http_response_code(404);
        }
    }
}
