<?php

namespace App\controllers;

class DashboardController extends Controller
{
    /**
     * Displays the main dashboard page.
     *
     * Checks if the user is logged in by verifying the presence of the session ID.
     * If the session ID exists, it renders the dashboard main view.
     * Otherwise, it returns a 404 HTTP response.
     *
     * @return void Outputs the rendered view or a 404 response if unauthorized.
     */
    public function index()
    {
        // Check if the user is logged in
        if (isset($_SESSION['id'])) {
            // Render the main dashboard view
            $this->render('dashboard/index');
        } else {
            // If the user is not logged in, return a 404 HTTP response code
            http_response_code(404);
        }
    }
}