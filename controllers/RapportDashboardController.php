<?php

namespace App\controllers;

use App\models\RapportModel;
use App\models\AnimalModel;

class RapportDashboardController extends DashboardController
{
    /**
     * Display the list of reports.
     *
     * Retrieves all reports from the database and renders the view to display them in the dashboard.
     *
     * @return void Renders the list of reports for the dashboard.
     */
    public function listRapports()
    {
        $rapportModel = new RapportModel();
        $rapports = $rapportModel->getAllRapports();

        if (isset($_SESSION['id'])) {
            // Render the list of reports view
            $this->render('dashboard/index', [
                'section' => 'list_rapports',
                'rapports' => $rapports
            ]);
        } else {
            http_response_code(404);
        }
    }

    /**
     * Create a new report.
     *
     * Handles the creation of a new report, including form submission, 
     * data validation, and insertion into the database. Only available for logged-in users.
     *
     * @return void Renders the add report form or redirects after successful addition.
     */
    public function addRapport()
    {
        $currentUserId = $_SESSION['id'];
        
        $animalModel = new AnimalModel();

        // Retrieve available animals for the dropdown list in the form
        $animals = $animalModel->selectAll();

        if ($_POST) {
            $rapportModel = new RapportModel();

            // Prepare data for insertion
            $data = [
                'name' => $_POST['name'],
                'dates' => $_POST['dates'],
                'states' => $_POST['states'],
                'recommended_food' => $_POST['recommended_food'],
                'recommended_weight' => $_POST['recommended_weight'],
                'food_given' => $_POST['food_given'],
                'quantity_donated' => $_POST['quantity_donated'],
                'commentaire' => $_POST['commentaire'] ?? null,
                'id_animal' => $_POST['id_animal'],
                'id_users' => $currentUserId  // Use the ID of the logged-in user
            ];

            // Insert the report into the database
            if ($rapportModel->createRapport($data)) {
                header('Location: /rapportDashboard/listRapports');
                exit();
            } else {
                $error = "Error adding the report.";
            }
        }

        if (isset($_SESSION['id'])) {
            
            // Render the view to add a report
            $this->render('dashboard/index', [
                'section' => 'add_rapport',
                'animals' => $animals,
                'error' => $error ?? null
            ]);
        } else {
            http_response_code(404);
        }
    }

    /**
     * Edit an existing report.
     *
     * Displays the form to edit a report and handles the submission to update the report
     * in the database. Only available for logged-in users.
     *
     * @param int $id The ID of the report to edit.
     * @return void Renders the edit report form or redirects after successful update.
     */
    public function editRapport($id)
    {
        $rapportModel = new RapportModel();
        $animalModel = new AnimalModel();

        // Retrieve the report and list of animals
        $rapport = $rapportModel->select($id);
        $animals = $animalModel->selectAll();

        // Ensure that the user is logged in and retrieve their ID
        if (isset($_SESSION['id'])) {
            $currentUserId = $_SESSION['id'];
        } else {
            http_response_code(404);
            exit();
        }

        if ($_POST) {
            // Prepare data for updating
            $data = [
                'name' => $_POST['name'],
                'dates' => $_POST['dates'],
                'states' => $_POST['states'],
                'recommended_food' => $_POST['recommended_food'],
                'recommended_weight' => $_POST['recommended_weight'],
                'food_given' => $_POST['food_given'],
                'quantity_donated' => $_POST['quantity_donated'],
                'commentaire' => $_POST['commentaire'] ?? null,
                'id_animal' => $_POST['id_animal'],
                'id_users' => $currentUserId  // Use the ID of the logged-in user
            ];

            // Update the report in the database
            if ($rapportModel->update($id, $data)) {
                header('Location: /rapportDashboard/listRapports');
                exit();
            } else {
                $error = "Error updating the report.";
            }
        }

        if (isset($_SESSION['id'])) {
            // Render the view to edit a report
            $this->render('dashboard/index', [
                'section' => 'edit_rapport',
                'rapport' => $rapport,
                'animals' => $animals,
                'error' => $error ?? null
            ]);
        } else {
            http_response_code(404);
        }
    }

    /**
     * Delete a report.
     *
     * Handles the deletion of a report from the database by its ID.
     * Only available for logged-in users.
     *
     * @param int $id The ID of the report to delete.
     * @return void Redirects to the list of reports or renders the list with an error message.
     */
    public function deleteRapport($id)
    {
        $rapportModel = new RapportModel();

        // Attempt to delete the report
        if ($rapportModel->delete($id)) {
            header('Location: /rapportDashboard/listRapports');
            exit();
        } else {
            $error = "Error deleting the report.";
        }

        if (isset($_SESSION['id'])) {
            // Render the list of reports with an error message if necessary
            $rapports = $rapportModel->getAllRapports();
            $this->render('dashboard/index', [
                'section' => 'list_rapports',
                'rapports' => $rapports,
                'error' => $error ?? null
            ]);
        } else {
            http_response_code(404);
        }
    }

    /**
     * Display a detailed report.
     *
     * Retrieves and displays the detailed view of a specific report.
     *
     * @param int $id The ID of the report to view.
     * @return void Renders the view report page.
     */
    public function viewRapport($id)
    {
        $rapportModel = new RapportModel();
        $rapport = $rapportModel->getRapportById($id);

        if (!$rapport) {
            header('Location: /rapportDashboard/listRapports');
            exit();
        }

        if (isset($_SESSION['id'])) {
            // Render the view for the detailed report
            $this->render('dashboard/index', [
                'section' => 'view_rapport',
                'rapport' => $rapport
            ]);
        } else {
            http_response_code(404);
        }
    }
}