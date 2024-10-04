<?php

namespace App\controllers;

use App\models\HabitatModel;
use App\models\AnimalModel;

class HabitatController extends Controller
{
    /**
     * Displays a list of all habitats.
     *
     * Fetches all habitats from the database using HabitatModel and renders the view
     * with the list of habitats.
     *
     * @return void Outputs the rendered view with the list of habitats.
     */
    public function index() 
    {
        // Create an instance of HabitatModel
        $HabitatModel = new HabitatModel;

        // Retrieve all habitats from the database
        $habitats = $HabitatModel->selectAll();

        // Render the view for displaying habitats
        $this->render('habitat/index', compact('habitats'));
    }

    /**
     * Displays animals in a specific habitat.
     *
     * Fetches all animals that belong to a specific habitat by its ID,
     * and also fetches the habitat details. Renders the view with the list of animals
     * and the habitat information.
     *
     * @param int $id The ID of the habitat whose animals are to be displayed.
     * @return void Outputs the rendered view with the list of animals and habitat information.
     */
    public function afficherAnimaux($id)
    {
        // Create an instance of AnimalModel
        $AnimalModel = new AnimalModel;

        // Retrieve all animals that belong to the specified habitat
        $animaux = $AnimalModel->getAnimalsByHabitat($id);

        // Create an instance of HabitatModel
        $HabitatModel = new HabitatModel;

        // Retrieve the habitat details by its ID
        $habitat = $HabitatModel->getHabitatById($id);

        // Render the view for displaying animals in the habitat, with both animals and habitat data
        $this->render('habitat/animaux', [
            'animaux' => $animaux,
            'habitat' => $habitat
        ]);
    }
}
