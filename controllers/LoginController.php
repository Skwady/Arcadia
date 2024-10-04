<?php

namespace App\controllers;

use App\models\LoginModel;

class LoginController extends Controller
{
    /**
     * Displays the login form.
     *
     * Renders the login view where users can enter their email and password
     * to authenticate.
     *
     * @return void Outputs the rendered login view.
     */
    public function index()
    {
        // Render the login view
        $this->render('login/index');
    }

    /**
     * Handles the login process.
     *
     * Validates the submitted email and password. If valid, it retrieves the user
     * from the database and verifies the password. Upon successful verification,
     * user data is stored in the session, allowing access to restricted areas.
     *
     * @return void Redirects to the home page upon successful login or exits with an error message on failure.
     */
    public function conect()
    {
        // Ensure that the request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Clean user inputs to avoid XSS attacks
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = trim($_POST['password']);
            
            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Set an error message for invalid email and stop further processing
                $_SESSION['error_message'] = "Invalid email.";
                exit();
            }

            // Create an instance of LoginModel to interact with the database
            $LoginModel = new LoginModel();

            // Retrieve user details by email
            $user = $LoginModel->search($email);
            
            // Verify if the user exists and the password is correct
            if ($user && password_verify($password, $user->password)) {
                
                // Store user information in session for further authentication
                $_SESSION['id'] = $user->id;
                $_SESSION['name'] = $user->name;
                $_SESSION['firstname'] = $user->firstname;
                $_SESSION['role'] = $user->role;

                // Redirect to the homepage after successful login
                header("Location: /");
                exit();
            } else {
                // Set error messages for incorrect credentials
                $_SESSION['error_message'] = $user ? "Incorrect password." : "User not found.";
                exit();
            }
        } else {
            // Set an error message for invalid request method
            $_SESSION['error_message'] = "Invalid request method.";
            exit();
        }
    }
}
