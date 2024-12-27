<?php

namespace App\tests;

use App\models\LoginModel;
use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

class LoginModelTest extends TestCase
{
    public function testSearch()
    {
        // Charger les variables d'environnement
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();

        $email = 'jd@gmail.com';

        // Instancier le modèle LoginModel
        $loginModel = new LoginModel();
        
        // Appeler la méthode search et capturer le résultat
        $result = $loginModel->search($email);

        // Vérifier que l'email dans le résultat est celui attendu
        $this->assertSame($email, $result->email);
    }
}