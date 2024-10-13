<?php 

namespace App\tests;

use PHPUnit\Framework\TestCase;
use App\config\MongoBase;
use App\models\AvisModel;
use Dotenv\Dotenv;

class AvisModelTest extends TestCase
{
    // Classe dérivée pour exposer la méthode protégée
    public function testGetCollection()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();

        $mongoBase = new class extends MongoBase {
            public function exposeGetCollection($database, $collection)
            {
                return $this->getCollection($database, $collection);
            }
        };

        // Maintenant vous pouvez tester la méthode getCollection
        $collection = $mongoBase->exposeGetCollection('testDatabase', 'testCollection');
        
        $this->assertNotNull($collection); // Vérifiez que la collection est bien récupérée
    }

    public function testGetAllAvis()
    {
        $avisModel = new AvisModel(); // AvisModel utilise MongoBase
        $result = $avisModel->getAllAvis(); // Testez une méthode publique qui utilise getCollection()

        $this->assertNotEmpty($result); // Assurez-vous que les avis sont retournés correctement
    }

}