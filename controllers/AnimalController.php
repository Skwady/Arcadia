<?php

namespace App\controllers;

use App\models\AnimalModel;

class AnimalController extends Controller
{
    /**
     * Displays a list of all animals.
     *
     * Fetches all animals from the database using the AnimalModel.
     * Passes the list of animals to the 'animal/index' view for rendering.
     *
     * @return void
     */
    public function index() 
    {
        // Create an instance of the AnimalModel
        $Animalmodel = new AnimalModel;

        // Retrieve all animals from the database
        $Animals = $Animalmodel->selectAll();

        // Render the 'animal/index' view, passing the list of animals
        $this->render('animal/index', compact('Animals'));
    }

    /**
     * Displays details of a specific animal.
     *
     * Fetches detailed information about an animal by its ID,
     * including race, habitat, and any related reports, and passes the data to the view.
     *
     * @param integer $id The ID of the animal to display.
     * @return void
     */
    public function lire($id)
    {
        // Create an instance of the AnimalModel
        $Animalmodel = new AnimalModel;

        // Retrieve detailed information about the animal by ID
        $animalDetails = $Animalmodel->getAnimalsWithDetails($id);

        // Render the 'animal/lire' view, passing the animal details
        $this->render('animal/lire', ['id' => $animalDetails]);
    }

    /**
     * Increments the visit count for a specific animal.
     *
     * Handles a POST request to increment the visit count of an animal by its ID.
     * Returns a JSON response indicating success or failure.
     *
     * @return void
     */
    public function incrementVisits()
    {
        // Ensure that the request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the JSON data from the request body
            $data = json_decode(file_get_contents('php://input'), true);
            
            // Check if the 'id' parameter is present in the request data
            if (isset($data['id'])) {
                // Convert the 'id' value to an integer
                $id = intval($data['id']);

                // Create an instance of the AnimalModel
                $Animalmodel = new AnimalModel;

                // Increment the visit count for the specified animal
                $result = $Animalmodel->incrementVisits($id);

                // Return a JSON response indicating success or failure
                if ($result) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Erreur lors de la mise à jour']);
                }
            } else {
                // Return an error if 'id' is missing
                echo json_encode(['success' => false, 'message' => 'ID manquant']);
            }
        } else {
            // Return an error if the request method is not POST
            echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
        }
    }
}
