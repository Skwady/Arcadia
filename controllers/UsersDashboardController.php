<?php

namespace App\controllers;

use App\models\RoleModel;
use App\models\UsersModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class UsersDashboardController extends DashboardController
{
    /**
     * Method to list all users.
     *
     * Retrieves all users from the database and renders the user list view.
     *
     * @return void
     */
    public function listUsers()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
            $userModel = new UsersModel();
            $users = $userModel->selectAll();

            $this->render('dashboard/index', [
                'section' => 'list_users',
                'users' => $users
            ]);
        } else {
            http_response_code(404);
        }
    }

    /**
     * Method to add a new user.
     *
     * Handles adding a new user to the system, including validating the input data,
     * assigning roles, hashing passwords, and sending a welcome email.
     *
     * @return void
     */
    public function addUser()
    {
        $usersModel = new UsersModel();
        $roleModel = new RoleModel();

        // Retrieve all users and roles for the view
        $users = $usersModel->selectAll();
        $roles = $roleModel->selectAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Extract and validate form data
            $name = $_POST['name'] ?? '';
            $firstname = $_POST['firstname'] ?? '';
            $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? '';

            // Check for missing or invalid fields
            if (empty($name) || empty($firstname) || empty($email) || empty($password) || empty($role)) {
                http_response_code(400);
                echo "All fields are required.";
                exit();
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                http_response_code(400);
                echo "Invalid email.";
                exit();
            }

            // Hash the user's password
            $hashed_password = password_hash($password, PASSWORD_ARGON2ID);

            // Verify role existence in the database
            $roleData = $usersModel->selectRole($role);
            if (!$roleData) {
                http_response_code(400);
                echo "Invalid role.";
                exit();
            }

            $roleId = $roleData->id;

            // Create the user in the database
            $result = $usersModel->createUser($name, $firstname, $email, $hashed_password, $roleId);
            if ($result) {
                // Send a welcome email to the new user
                if ($this->sendWelcomeEmail($email, $name)) {
                    echo "User successfully registered, and email sent.";
                } else {
                    echo "User registered, but email could not be sent.";
                }
                header('Location: /usersDashboard/listUsers');
                exit();
            } else {
                http_response_code(500);
                echo "Error during user creation.";
                exit();
            }
        }

        // Render the add user view if the user has the right permissions
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
            $this->render('dashboard/index', [
                'section' => 'add_user',
                'users' => $users,
                'roles' => $roles
            ]);
        } else {
            http_response_code(404);
        }
    }

    /**
     * Function to send a welcome email using PHPMailer.
     *
     * Sends a welcome email to the newly registered user.
     *
     * @param string $email The user's email address.
     * @param string $name The user's name.
     * @return bool Returns true if the email was successfully sent, false otherwise.
     */
    private function sendWelcomeEmail($email, $name)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = $_ENV['MAIL_HOST'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV['MAIL_USERNAME'];
            $mail->Password   = $_ENV['MAIL_PASSWORD'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = $_ENV['MAIL_PORT'];

            // Set sender details
            $mail->setFrom($_ENV['MAIL_USERNAME'], 'Arcadia');
            $mail->addAddress($email);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Bienvenue sur ARCADIA' . $name;
            $mail->Body    = 'Votre identifiant de connexion est : ' . $email . '<br> Rapprochez-vous de l\'administrateur pour obtenir votre mot de passe !';

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }

    /**
     * Method to edit an existing user.
     *
     * Handles editing user information such as updating user details and roles.
     *
     * @param int $id The ID of the user to edit.
     * @return void
     */
    public function editUser($id)
    {
        $userModel = new UsersModel();

        // Retrieve user data by ID
        $user = $userModel->select($id);
        $roles = $userModel->selectAll();

        if (!$user) {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => "User not found."]);
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel->hydrate($_POST);

            // Update user information in the database
            if ($userModel->update($id)) {
                header('Location: /usersDashboard/listUsers');
                exit();
            } else {
                $error = "Error updating the user.";
            }
        }

        // Render the edit user view if the user has the right permissions
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
            $this->render('dashboard/index', [
                'section' => 'edit_user',
                'user' => $user,
                'roles' => $roles,
                'error' => $error ?? null
            ]);
        } else {
            http_response_code(404);
        }
    }

    /**
     * Method to delete a user.
     *
     * Deletes a user from the system based on the provided user ID.
     *
     * @param int $id The ID of the user to delete.
     * @return void
     */
    public function deleteUser($id)
    {
        $userModel = new UsersModel();
        $user = $userModel->select($id);

        if ($user) {
            if ($userModel->delete($id)) {
                header('Location: /usersDashboard/listUsers');
                exit();
            } else {
                $error = "Error deleting the user.";
            }
        } else {
            $error = "User not found.";
        }

        // Render the user list view with an error message if necessary
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
            $this->render('dashboard/index', [
                'section' => 'list_users',
                'error' => $error ?? null
            ]);
        } else {
            http_response_code(404);
        }
    }
}