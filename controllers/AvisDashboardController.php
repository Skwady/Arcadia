<?php

namespace App\controllers;

use App\models\AvisModel;

class AvisDashboardController extends DashboardController
{
    private $avisModel;

    /**
     * Initializes the AvisDashboardController instance.
     *
     * Creates an instance of AvisModel for use across the methods in the controller.
     */
    public function __construct()
    {
        $this->avisModel = new AvisModel();
    }

    /**
     * Displays a list of all reviews (avis) in the dashboard.
     *
     * Fetches all reviews from the database using AvisModel and passes them to the view for rendering.
     * Only accessible to users with 'Admin' or 'Employe' roles.
     *
     * @return void Outputs the rendered view with the list of reviews.
     */
    public function listAvis()
    {
        // Retrieve all reviews
        $avis = $this->avisModel->getAllAvis();

        // Check if the user is authorized to view the list of reviews
        if (isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')) {
            // Render the view with the list of reviews
            $this->render('dashboard/index', [
                'avis' => $avis,
                'section' => 'list_avis'
            ]);
        } else {
            // If unauthorized, return a 404 HTTP response code
            http_response_code(404);
        }
    }

    /**
     * Authorizes a review.
     *
     * Handles the POST request to authorize a review by setting its visibility status to true.
     * Redirects to the list of reviews after authorization.
     *
     * @return void Redirects to the review list view on success.
     */
    public function authorizeAvis()
    {
        // Check if the review ID is provided via POST
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            // Authorize the review by updating its status
            if ($this->avisModel->authorizeAvis($id)) {
                // Redirect to the list of reviews after successful authorization
                header('Location: /avisDashboard/listAvis');
                exit();
            }
        }
    }

    /**
     * Deletes a review.
     *
     * Handles the POST request to delete a review from the database.
     * Redirects to the list of reviews after deletion.
     *
     * @return void Redirects to the review list view on success.
     */
    public function deleteAvis()
    {
        // Check if the review ID is provided via POST
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            // Delete the review from the database
            if ($this->avisModel->deleteAvis($id)) {
                // Redirect to the list of reviews after successful deletion
                header('Location: /avisDashboard/listAvis');
                exit();
            }
        }
    }
}
