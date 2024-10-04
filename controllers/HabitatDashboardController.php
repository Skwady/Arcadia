<?php

namespace App\controllers;

use App\models\HabitatModel;
use App\config\CloudinaryService;

class HabitatDashboardController extends DashboardController
{
    /**
     * Lists all habitats.
     *
     * Fetches all habitats from the database using HabitatModel and renders the view
     * with the list of habitats. Only accessible to logged-in users.
     *
     * @return void Outputs the rendered view with the list of habitats or a 404 response if unauthorized.
     */
    public function listHabitats()
    {
        // Create an instance of HabitatModel
        $habitatModel = new HabitatModel();

        // Retrieve all habitats
        $habitats = $habitatModel->selectAll();
        
        // Check if the user is logged in
        if (isset($_SESSION['id'])) {
            // Render the dashboard view to list habitats
            $this->render('dashboard/index', [
                'section' => 'list_habitats',
                'habitats' => $habitats
            ]);
        } else {
            // Return a 404 response if the user is unauthorized
            http_response_code(404);
        }
    }

    /**
     * Adds a new habitat.
     *
     * Handles the POST request to add a new habitat by collecting form data and image upload.
     * Uploads the image to Cloudinary and saves the habitat in the database.
     * Only accessible to Admin users.
     *
     * @return void Outputs the view to add a habitat or redirects after successful creation.
     */
    public function addHabitat()
    {
        $habitatModel = new HabitatModel();
        $cloudinaryService = new CloudinaryService();

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Hydrate the model with form data
            $habitatModel->hydrate($_POST);

            // Handle image upload
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $image = $_FILES['image'];

                // Check if the file type is allowed
                $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
                if (in_array($image['type'], $allowedTypes)) {
                    // Upload the image to Cloudinary
                    $fileUrl = $cloudinaryService->uploadFile($image['tmp_name']);
                    if ($fileUrl) {
                        // Set the slug field to the image URL
                        $habitatModel->setSlug($fileUrl);

                        // Add the habitat to the database
                        if ($habitatModel->create()) {
                            // Redirect to the list of habitats after successful addition
                            header('Location: /habitatDashboard/listHabitats');
                            exit();
                        } else {
                            $error = "Error adding the habitat.";
                        }
                    } else {
                        $error = "Error uploading the image to Cloudinary.";
                    }
                } else {
                    $error = "File type not allowed. Only JPEG, PNG, WEBP, and GIF files are allowed.";
                }
            } else {
                $error = "Please select an image max 10M to upload.";
            }
        }

        // Check if the user is an Admin
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
            // Render the view to add a new habitat
            $this->render('dashboard/index', [
                'section' => 'add_habitat',
                'error' => $error ?? null
            ]);
        } else {
            // Return a 404 response if the user is unauthorized
            http_response_code(404);
        }
    }

    /**
     * Deletes a habitat by its ID.
     *
     * Deletes the habitat from the database and removes the associated image from Cloudinary.
     * Only accessible to Admin users.
     *
     * @param int $id The ID of the habitat to delete.
     * @return void Redirects to the list of habitats or displays an error if deletion fails.
     */
    public function deleteHabitat($id)
    {
        $habitatModel = new HabitatModel();
        $habitat = $habitatModel->getHabitatById($id);
        $cloudinaryService = new CloudinaryService();

        // Check if the habitat exists
        if ($habitat) {
            // Delete the associated image from Cloudinary if it exists
            if ($habitat->slug) {
                // Extract the Cloudinary public ID from the URL
                $publicId = basename(parse_url($habitat->slug, PHP_URL_PATH), '.' . pathinfo($habitat->slug, PATHINFO_EXTENSION));
                $cloudinaryService->deleteFile('habitats/' . $publicId);
            }

            // Delete the habitat from the database
            if ($habitatModel->delete($id)) {
                // Redirect to the list of habitats after successful deletion
                header('Location: /habitatDashboard/listHabitats');
                exit();
            } else {
                $error = "Error deleting the habitat.";
            }
        } else {
            $error = "Habitat not found.";
        }

        // Check if the user is an Admin
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
            // Render the habitat list view with an error message if necessary
            $this->render('dashboard/index', [
                'section' => 'list_habitats',
                'error' => $error ?? null
            ]);
        } else {
            // Return a 404 response if the user is unauthorized
            http_response_code(404);
        }
    }

    /**
     * Edits an existing habitat.
     *
     * Handles the form submission to update habitat details, including an optional image update.
     * Uploads the new image to Cloudinary and deletes the old one if present.
     * Only accessible to Admin and Employee users.
     *
     * @param int $id The ID of the habitat to be edited.
     * @return void Outputs the view to edit a habitat or redirects after successful update.
     */
    public function editHabitat($id)
    {
        $habitatModel = new HabitatModel();
        $habitat = $habitatModel->getHabitatById($id);
        $cloudinaryService = new CloudinaryService();

        // Handle form submission
        if ($_POST) {
            // Hydrate the model with the new form data
            $habitatModel->hydrate($_POST);

            // Handle the upload of a new image if present
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $image = $_FILES['image'];

                // Check if the file type is allowed
                $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
                if (in_array($image['type'], $allowedTypes)) {
                    // Delete the old image from Cloudinary if it exists
                    if ($habitat->slug) {
                        $publicId = basename(parse_url($habitat->slug, PHP_URL_PATH), '.' . pathinfo($habitat->slug, PATHINFO_EXTENSION));
                        $cloudinaryService->deleteFile('habitats/' . $publicId);
                    }

                    // Upload the new image to Cloudinary
                    $fileUrl = $cloudinaryService->uploadFile($image['tmp_name']);
                    if ($fileUrl) {
                        // Update the model with the new image URL
                        $habitatModel->setSlug($fileUrl);
                    } else {
                        $error = "Error uploading the new image to Cloudinary.";
                    }
                } else {
                    $error = "File type not allowed.";
                }
            }

            // Update the habitat in the database
            if ($habitatModel->update($id)) {
                // Redirect to the list of habitats after successful update
                header('Location: /habitatDashboard/listHabitats');
                exit();
            } else {
                $error = "Error updating the habitat.";
            }
        }

        // Check if the user is an Admin or Employee
        if (isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')) {
            // Render the view to edit a habitat
            $this->render('dashboard/index', [
                'section' => 'edit_habitat',
                'habitat' => $habitat,
                'error' => $error ?? null
            ]);
        } else {
            // Return a 404 response if the user is unauthorized
            http_response_code(404);
        }
    }
}
