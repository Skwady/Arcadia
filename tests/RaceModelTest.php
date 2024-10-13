<?php

namespace App\tests;

use App\models\RaceModel;
use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

class RaceModelTest extends TestCase
{
    public function testGetRaceById()
    {
        // Charger les variables d'environnement
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();

        $raceModel = new RaceModel();
        $race = $raceModel->getRaceById(7);

        $this->assertSame(7, $race->id);
    }
}