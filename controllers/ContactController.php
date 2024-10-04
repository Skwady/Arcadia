<?php

namespace App\controllers;

use App\models\HoraireModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController extends Controller
{
    /**
     * Displays the contact page and handles form submissions.
     *
     * If the request method is POST, processes the contact form submission, validates the input,
     * and sends an email using PHPMailer. If the request is GET, simply renders the contact page
     * with business hours fetched from the database.
     *
     * @return void Outputs the rendered view or redirects after form processing.
     */
    public function index()
    {
        // Retrieve business hours from the database
        $HoraireModel = new HoraireModel();
        $horaireId = 1; // Fixed schedule ID, can be made dynamic if needed
        $horaires = $HoraireModel->getHoraireById($horaireId);

        // Handle form submission if request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Extract data from the form
            $name = $_POST['name'] ?? '';
            $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
            $message = $_POST['message'] ?? '';

            // Validate input fields
            if (empty($name) || empty($email) || empty($message)) {
                // Set error message if fields are empty
                $_SESSION['error_message'] = "Veuillez remplir correctement tous les champs.";
                header("Location: /contact");
                exit();
            }

            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Set error message if email is invalid
                $_SESSION['error_message'] = "Adresse e-mail invalide.";
                header("Location: /contact");
                exit();
            }

            // Send email if all data is valid
            if ($_POST) {
                if ($this->sendEmail($_ENV['MAIL_USERNAME'], "Nouveau message de $name", $message, $email, $name)) {
                    // Set success message on successful email sending
                    $_SESSION['success_message'] = "Votre message a été envoyé avec succès.";
                } else {
                    // Set error message if email sending fails
                    $_SESSION['error_message'] = "Une erreur s'est produite lors de l'envoi de votre message.";
                }
            }

            // Redirect after processing the form to prevent form resubmission
            header("Location: /contact");
            exit();
        }

        // Render the contact view with business hours data
        $this->render('contact/index', compact('horaires'));
    }

    /**
     * Sends an email using PHPMailer.
     *
     * Configures SMTP settings and sends an email with the provided subject, message content,
     * and reply-to information. Handles errors gracefully and logs them.
     *
     * @param string $to Recipient's email address.
     * @param string $subject The subject of the email.
     * @param string $messageContent The content of the email body.
     * @param string|null $replyToEmail (Optional) Reply-to email address.
     * @param string|null $replyToName (Optional) Name of the sender.
     * @return bool Returns true if the email was sent successfully, false otherwise.
     */
    private function sendEmail($to, $subject, $messageContent, $replyToEmail = null, $replyToName = null)
    {
        $mail = new PHPMailer(true);

        try {
            // SMTP configuration settings
            $mail->isSMTP();
            $mail->Host       = $_ENV['MAIL_HOST'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV['MAIL_USERNAME'];
            $mail->Password   = $_ENV['MAIL_PASSWORD'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = $_ENV['MAIL_PORT'];
            $mail->CharSet    = 'UTF-8';

            // Set the sender's email address
            $mail->setFrom($_ENV['MAIL_USERNAME'], 'Formulaire de contact Arcadia');

            // Add the reply-to address if provided
            if ($replyToEmail) {
                $mail->addReplyTo($replyToEmail, $replyToName ?? '');
            }

            // Set the recipient's email address
            $mail->addAddress($to);

            // Configure email content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = "<p><strong>Nom :</strong> {$replyToName}</p>
                              <p><strong>Email :</strong> {$replyToEmail}</p>
                              <p><strong>Message :</strong><br>{$messageContent}</p>";

            // Send the email
            $mail->send();
            return true;

        } catch (Exception $e) {
            // Log the error if sending fails
            error_log("Erreur d'envoi d'e-mail : " . $mail->ErrorInfo);
            return false;
        }
    }
} 