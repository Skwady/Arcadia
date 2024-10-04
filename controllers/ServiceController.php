<?php

namespace App\controllers;

use App\models\EvenementModel;
use App\models\ServiceModel;

class ServiceController extends Controller
{
    /**
     * Display the list of services and upcoming events.
     *
     * This method retrieves all services and events from the database and renders
     * the view to display them on the services page.
     *
     * @return void Renders the service index view with the list of services and events.
     */
    public function index()
    {
        // Instantiate the ServiceModel to retrieve all services
        $serviceModel = new ServiceModel();
        $services = $serviceModel->selectAll();

        // Instantiate the EvenementModel to retrieve all events
        $evenementModel = new EvenementModel();
        $evenements = $evenementModel->getAllEvenement();

        // Render the services and events in the view
        $this->render('service/index', compact('services', 'evenements'));
    }
}