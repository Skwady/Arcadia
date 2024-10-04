<?php

namespace App\controllers;

use App\models\HoraireModel;

class HoraireDashboardController extends ContactController
{
    /**
     * Lists all schedules (horaires).
     *
     * Fetches all horaires from the database using HoraireModel and renders the view
     * with the list of horaires. This method is used to display the schedules section in the dashboard.
     *
     * @return void Outputs the rendered view with the list of horaires.
     */
    public function listHoraires()
    {
        // Create an instance of HoraireModel
        $horaireModel = new HoraireModel();

        // Retrieve all horaires from the database
        $horaires = $horaireModel->getAllHoraires();

        // Render the view for listing horaires in the dashboard
        $this->render('dashboard/index', [
            'horaires' => $horaires,
            'section' => 'list_horaires'
        ]);
    }

    /**
     * Edits an existing schedule (horaire).
     *
     * Fetches a specific horaire by its ID and displays it in the edit form.
     * Handles the form submission to update the horaire details in the database.
     *
     * @param int $id The ID of the horaire to be edited.
     * @return void Outputs the rendered view with the edit form or redirects after successful update.
     */
    public function editHoraire($id)
    {
        // Create an instance of HoraireModel
        $horaireModel = new HoraireModel();

        // Retrieve the horaire by its ID
        $horaire = $horaireModel->getHoraireById($id);

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the updated schedule from the form data
            $horaire = $_POST['horaire'];

            // Update the horaire in the database
            $horaireModel->updateHoraire($id, $horaire);

            // Redirect to the list of horaires after a successful update
            header('Location: /horaireDashboard/listHoraires');
            exit();
        }

        // Render the view for editing an horaire
        $this->render('dashboard/index', [
            'horaire' => $horaire,
            'section' => 'edit_horaire'
        ]);
    }
}