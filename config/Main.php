<?php

namespace App\config;

use App\controllers\MainController;

class Main
{
    /**
     * Start the application.
     *
     * Initializes the session, handles CSRF token generation, processes
     * the URL to determine the appropriate controller and action, and sanitizes
     * incoming POST data.
     *
     * @return void
     */
    public function start()
    {
        // Start the session
        session_start();

        // Generate a CSRF token if it doesn't already exist
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        // Retrieve the URI and remove the trailing slash if necessary
        $uri = $_SERVER['REQUEST_URI'];

        if (!empty($uri) && $uri != '/' && $uri[-1] === '/') {
            $uri = substr($uri, 0, -1);

            // Redirect permanently to the URI without the trailing slash
            http_response_code(301);
            header('Location: ' . $uri);
            exit();
        }

        // Check the CSRF token and sanitize POST data if the request is a POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $csrfToken = $_POST['csrf_token'] ?? '';
            $this->checkCsrfToken($csrfToken);

            // Sanitize the POST data
            $_POST = $this->sanitizeFormData($_POST);
        }

        // Extract parameters from the URL
        $params = isset($_GET['p']) ? explode('/', filter_var($_GET['p'], FILTER_SANITIZE_URL)) : [];

        // Check if a controller is specified
        if (isset($params[0]) && $params[0] != '') {
            // Build the controller name
            $controllerName = '\\App\\controllers\\' . ucfirst(array_shift($params)) . 'Controller';

            // Check if the controller exists
            if (class_exists($controllerName)) {
                $controller = new $controllerName();
            } else {
                // Return a 404 error if the controller does not exist
                $this->error404("Le contrôleur '$controllerName' n'existe pas.");
                return;
            }

            // Get the controller action (method)
            $action = (isset($params[0])) ? array_shift($params) : 'index';

            // Check if the action method exists in the controller
            if (method_exists($controller, $action)) {
                // Call the action with the remaining parameters
                call_user_func_array([$controller, $action], $params);
            } else {
                // Return a 404 error if the action does not exist
                $this->error404("L'action '$action' n'existe pas dans le contrôleur '$controllerName'.");
            }
        } else {
            // If no parameters are provided, use the default controller and action
            $controller = new MainController();
            $controller->index();
        }
    }

    /**
     * Checks the CSRF token for POST requests.
     *
     * Validates the provided CSRF token against the one stored in the session
     * to prevent CSRF attacks.
     *
     * @param string $token The CSRF token to validate.
     * @return void
     */
    public function checkCsrfToken($token)
    {
        if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
            // Return a 403 error if the CSRF token is invalid or missing
            http_response_code(403);
            echo 'Invalid CSRF token.';
            exit();
        }
    }

    /**
     * Sanitizes form data by removing HTML tags while maintaining original data types.
     *
     * Sanitizes all incoming form data, recursively if needed, to prevent XSS attacks.
     *
     * @param array $data An array containing form data ($_POST or $_GET).
     * @return array Sanitized data array.
     */
    private function sanitizeFormData(array $data)
    {
        $sanitizedData = [];
        foreach ($data as $key => $value) {
            // Recursively sanitize if the value is an array
            if (is_array($value)) {
                $sanitizedData[$key] = $this->sanitizeFormData($value);
            } else {
                // Apply strip_tags only to strings
                if (is_string($value)) {
                    $sanitizedData[$key] = strip_tags($value);
                } else {
                    // Retain other data types (int, float, etc.)
                    $sanitizedData[$key] = $value;
                }
            }
        }
        return $sanitizedData;
    }

    /**
     * Displays a 404 error page.
     *
     * Sends a 404 HTTP status code and displays an error message.
     *
     * @param string $message The error message to display.
     * @return void
     */
    private function error404($message)
    {
        http_response_code(404);
        echo $message;
    }
}