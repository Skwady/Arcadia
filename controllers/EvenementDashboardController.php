<?php

namespace App\controllers;

use App\models\EvenementModel;
use MongoDB\BSON\ObjectId;

class EvenementDashboardController extends DashboardController
{
    private $evenementModel;

    /**
     * Initializes the EvenementDashboardController instance.
     *
     * Creates an instance of EvenementModel to interact with event data.
     */
    public function __construct()
    {
        $this->evenementModel = new EvenementModel();
    }

    /**
     * Lists all events.
     *
     * Fetches all events from the database using EvenementModel and passes them to the view for rendering.
     * Only accessible to users with 'Admin' or 'Employe' roles.
     *
     * @return void Outputs the rendered view with the list of events or an error message if unauthorized.
     */
    public function listEvenement()
    {
        // Retrieve all events
        $evenements = $this->evenementModel->getAllEvenement();

        // Check if the user has the correct role to access this section
        if (isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')) {
            // Render the dashboard view with the list of events
            $this->render('dashboard/index', [
                'evenements' => $evenements,
                'section' => 'list_evenements'
            ]);
        } else {
            // Return a 404 response code and display an access denied message
            http_response_code(404);
            echo "Accès refusé.";
        }
    }

    /**
     * Displays the event to be edited.
     *
     * Retrieves the specified event by its ID and renders the edit view.
     *
     * @param string $id The ID of the event to be edited.
     * @return void Outputs the rendered edit view or an error message if the event is not found.
     */
    public function showEvenement($id)
    {
        // Retrieve the event by its ID
        $evenement = $this->evenementModel->getEvenementById($id);

        // Check if the event was found
        if ($evenement) {
            // Render the edit event view with the event data
            $this->render('dashboard/index', [
                'evenement' => $evenement,
                'section' => 'edit_evenement'
            ]);
        } else {
            // Display an error message if the event was not found
            echo "Événement non trouvé.";
        }
    }

    /**
     * Updates an event.
     *
     * Handles the POST request to update an event's description.
     * Redirects to the event list view after a successful update or displays an error message if the update fails.
     *
     * @param string $id The ID of the event to be updated.
     * @return void Redirects to the event list view on success or displays an error message.
     */
    public function updateEvenement($id)
    {
        // Check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the updated description from the form data
            $description = $_POST['description'];

            // Attempt to update the event using the EvenementModel
            $result = $this->evenementModel->updateEvenement($id, $description);

            // Check if the update was successful
            if ($result) {
                // Redirect to the list of events after a successful update
                header("Location: /evenementDashboard/listEvenement");
                exit();
            } else {
                // Display an error message if the update fails
                echo "Erreur lors de la mise à jour de l'événement.";
            }
        }
    }
}
