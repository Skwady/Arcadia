<?php

namespace App\controllers;

class DeconectController extends Controller
{
    /**
     * Handles the user logout process.
     *
     * Clears all session variables to log out the user and then redirects them to the main page.
     *
     * @return void Redirects the user to the homepage after logging out.
     */
    public function index()
    {
        // Clear all session variables to log out the user
        session_unset();

        // Redirect to the main page
        header("Location: /");
        exit();
    }
}