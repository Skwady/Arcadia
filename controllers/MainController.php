<?php

namespace App\controllers;

use App\models\AvisModel;

class MainController extends Controller
{
    /**
     * Displays the main page with reviews.
     *
     * Retrieves all visible reviews from the database and renders the main page view.
     * If a POST request is detected, it calls the `addAvis()` method to add a new review.
     *
     * @return void Outputs the rendered main view with the list of reviews.
     */
    public function index()
    {
        // Create an instance of AvisModel to interact with reviews
        $avisModel = new AvisModel();
        
        // Check if the request method is POST to handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Call the addAvis() method to handle adding a new review
            $this->addAvis();
        }

        // Retrieve all visible reviews
        $avis = $avisModel->getAvis();

        // Render the main page with the retrieved reviews
        $this->render('main/index', compact('avis'));
    }

    /**
     * Adds a new review.
     *
     * Handles the addition of a new review by collecting the pseudo and comment from the POST data.
     * Stores the review in the database using AvisModel and redirects to the main page.
     *
     * @return void Redirects to the main page upon successful addition to prevent form resubmission.
     */
    public function addAvis()
    {
        // Check if the required form fields are set
        if (isset($_POST['pseudo']) && isset($_POST['commentaire'])) {
            // Collect form data
            $pseudo = $_POST['pseudo'];
            $commentaire = $_POST['commentaire'];

            // Create an instance of AvisModel
            $avisModel = new AvisModel();

            // Add the review to the database
            $avisModel->addAvis($pseudo, $commentaire);

            // Redirect to the main page to prevent form resubmission (POST/Redirect/GET pattern)
            header('Location: /');
            exit();
        }
    }
}