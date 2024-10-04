<?php

namespace App\controllers;

use App\models\RaceModel;

class RaceDashboardController extends DashboardController
{
    /**
     * Adds a new race.
     *
     * Handles the form submission to add a new race. It hydrates the `RaceModel`
     * with the data from the form and attempts to insert it into the database.
     * If successful, redirects to the list of races. Otherwise, displays an error message.
     *
     * @return void Renders the view to add a new race or redirects after successful addition.
     */
    public function addRace()
    {
        $raceModel = new RaceModel();

        // Check if form is submitted via POST
        if ($_POST) {
            // Hydrate the model with the data from the form
            $raceModel->hydrate($_POST);

            // Create a new race in the database
            if ($raceModel->create()) {
                header('Location: /raceDashboard/listRaces');
                exit();
            } else {
                $error = "Error adding the race.";
            }
        }

        // Ensure that only an admin can access this section
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
            // Render the view to add a new race
            $this->render('dashboard/index', [
                'section' => 'add_race',
                'error' => $error ?? null
            ]);
        } else {
            http_response_code(404);
        }
    }

    /**
     * Lists all races.
     *
     * Fetches all races from the database using `RaceModel` and renders the view
     * with the list of races for the dashboard.
     *
     * @return void Outputs the rendered list of races.
     */
    public function listRaces()
    {
        $raceModel = new RaceModel();

        // Retrieve all races from the database
        $races = $raceModel->selectAll();

        // Ensure that the user is logged in
        if (isset($_SESSION['id'])) {
            // Render the view for listing all races
            $this->render('dashboard/index', [
                'section' => 'list_races',
                'races' => $races
            ]);
        } else {
            http_response_code(404);
        }
    }

    /**
     * Edits an existing race.
     *
     * Displays the form to edit a race by its ID and handles the form submission to
     * update the race in the database. If the update is successful, redirects to
     * the list of races.
     *
     * @param int $id The ID of the race to be edited.
     * @return void Renders the edit race view or redirects after successful update.
     */
    public function editRace($id)
    {
        $raceModel = new RaceModel();

        // Retrieve the race by its ID
        $race = $raceModel->getRaceById($id);

        // Check if form is submitted via POST
        if ($_POST) {
            // Hydrate the model with new data from the form
            $raceModel->hydrate($_POST);

            // Update the race in the database
            if ($raceModel->update($id)) {
                header('Location: /raceDashboard/listRaces');
                exit();
            } else {
                $error = "Error updating the race.";
            }
        }

        // Ensure that the user has the proper role to edit races
        if (isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Employe')) {
            // Render the view for editing a race
            $this->render('dashboard/index', [
                'section' => 'edit_race',
                'race' => $race,
                'error' => $error ?? null
            ]);
        } else {
            http_response_code(404);
        }
    }

    /**
     * Deletes a race.
     *
     * Handles the deletion of a race by its ID. If the race is found, it attempts
     * to delete it from the database. If successful, redirects to the list of races.
     * If not, displays an error message.
     *
     * @param int $id The ID of the race to be deleted.
     * @return void Renders the list of races view with an error message or redirects after successful deletion.
     */
    public function deleteRace($id)
    {
        $raceModel = new RaceModel();

        // Retrieve the race by its ID
        $race = $raceModel->getRaceById($id);

        if ($race) {
            // Attempt to delete the race from the database
            if ($raceModel->delete($id)) {
                header('Location: /raceDashboard/listRaces');
                exit();
            } else {
                $error = "Error deleting the race.";
            }
        } else {
            $error = "Race not found.";
        }

        // Ensure that only an admin can delete a race
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
            // Render the list of races view with an error message if necessary
            $this->render('dashboard/index', [
                'section' => 'list_races',
                'error' => $error ?? null
            ]);
        } else {
            http_response_code(404);
        }
    }
}