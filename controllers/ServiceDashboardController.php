<?php

namespace App\controllers;

use App\models\ServiceModel;
use App\config\CloudinaryService;

class ServiceDashboardController extends DashboardController
{
    /**
     * Method to add a new service.
     *
     * Handles the creation of a new service, including uploading an image to Cloudinary.
     *
     * @return void
     */
    public function addService()
    {
        $cloudinaryService = new CloudinaryService();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Gather form data
            $name = $_POST['name'];
            $description = $_POST['description'];
            $id_users = $_SESSION['id'];
            $slug = null;

            // Handle image upload
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $image = $_FILES['image'];

                // Check if file type is allowed
                $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
                if (in_array($image['type'], $allowedTypes)) {
                    // Upload the image to Cloudinary
                    $fileUrl = $cloudinaryService->uploadFile($image['tmp_name']);
                    if ($fileUrl) {
                        $slug = $fileUrl; // Use the image URL as the slug
                    } else {
                        $error = "Error uploading the image to Cloudinary.";
                    }
                } else {
                    $error = "File type not allowed. Only JPEG, PNG, WEBP, and GIF files are allowed.";
                }
            } else {
                $error = "Please select an image (max 10MB) to upload.";
            }

            // Validate form inputs
            if (!empty($name) && !empty($description) && !empty($id_users) && $slug) {
                $serviceModel = new ServiceModel();
                $serviceModel->addService($name, $description, $id_users, $slug);

                // Redirect to service list after adding
                header('Location: /serviceDashboard/listServices');
                exit();
            } else {
                echo "All fields are required.";
            }
        }

        // Render the add service view if the user has the right permissions
        if (isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')) {
            $this->render('dashboard/index', [
                'section' => 'add_service'
            ]);
        } else {
            http_response_code(404);
        }
    }

    /**
     * Method to list all services.
     *
     * Retrieves all services from the database and renders the view.
     *
     * @return void
     */
    public function listServices()
    {
        $serviceModel = new ServiceModel();
        $services = $serviceModel->getAllServices();

        if (isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')) {
            $this->render('dashboard/index', [
                'services' => $services,
                'section' => 'list_services'
            ]);
        } else {
            http_response_code(404);
        }
    }

    /**
     * Method to edit a service.
     *
     * Handles editing of a service, including updating details and uploading a new image if provided.
     *
     * @param int $id The ID of the service to edit.
     * @return void
     */
    public function editService($id)
    {
        $cloudinaryService = new CloudinaryService();
        $serviceModel = new ServiceModel();
        $service = $serviceModel->getServiceById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Gather form data
            $name = $_POST['name'];
            $description = $_POST['description'];
            $id_users = $_SESSION['id'];
            $slug = null;

            // Handle upload of a new image if present
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $image = $_FILES['image'];

                // Check if file type is allowed
                $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
                if (in_array($image['type'], $allowedTypes)) {
                    // Upload the new image to Cloudinary
                    $fileUrl = $cloudinaryService->uploadFile($image['tmp_name']);
                    if ($fileUrl) {
                        $slug = $fileUrl; // Update slug with the new image URL
                    } else {
                        $error = "Error uploading the new image to Cloudinary.";
                    }
                } else {
                    $error = "File type not allowed.";
                }
            }

            // Validate form inputs and update service
            if (!empty($name) && !empty($description) && !empty($id_users)) {
                if ($serviceModel->update($id, $name, $description, $id_users, $slug)) {
                    header('Location: /serviceDashboard/listServices');
                    exit();
                } else {
                    $error = "Error updating the service.";
                }
            } else {
                echo "All fields are required.";
            }
        }

        // Render the edit service view if the user has the right permissions
        if ($service) {
            if (isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')) {
                $this->render('dashboard/index', [
                    'section' => 'edit_service',
                    'service' => $service
                ]);
            } else {
                http_response_code(404);
            }
        } else {
            echo "Service not found.";
        }
    }

    /**
     * Method to delete a service.
     *
     * Handles deleting a service, including removing its associated image from Cloudinary.
     *
     * @param int $id The ID of the service to delete.
     * @return void
     */
    public function deleteService($id)
    {
        $cloudinaryService = new CloudinaryService();
        $serviceModel = new ServiceModel();
        $service = $serviceModel->getServiceById($id);

        if ($service) {
            // Delete the associated image on Cloudinary if it exists
            if ($service->slug) {
                $publicId = basename(parse_url($service->slug, PHP_URL_PATH), '.' . pathinfo($service->slug, PATHINFO_EXTENSION));
                $cloudinaryService->deleteFile('services/' . $publicId);
            }

            // Delete the service from the database
            if ($serviceModel->delete($id)) {
                header('Location: /serviceDashboard/listServices');
                exit();
            } else {
                $error = "Error deleting the service.";
            }
        } else {
            $error = "Service not found.";
        }

        // Render the list of services view if there is an error
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
            $this->render('dashboard/index', [
                'section' => 'list_services',
                'error' => $error ?? null
            ]);
        } else {
            http_response_code(404);
        }
    }
}