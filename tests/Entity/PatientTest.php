<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Patient;
use DateTime;
use SebastianBergmann\Environment\Console;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


class PatientTest extends KernelTestCase
{

    public function testSetNom()
    {
        $patient = new Patient();
        $patient->setNom("DUPOND");
        $nom = $patient->getNom();

        $this->assertEquals("DUPOND", $nom, "setNom does not affect the right value.");
    }

    public function testGetNom()
    {
        $patient = new Patient();
        $patient->setNom("DUPOND");
        $nom = $patient->getNom();

        $this->assertEquals("DUPOND", $nom, "getNom returns a bad value.");
    }
    public function testSetPrenom()
    {
        $patient = new Patient();
        $patient->setPrenom("Bob");
        $prenom = $patient->getPrenom();

        $this->assertEquals("Bob", $prenom, "setPrenom does not affect the right value.");
    }

    public function testGetPrenom()
    {
        $patient = new Patient();
        $patient->setPrenom("Bob");
        $prenom = $patient->getPrenom();

        $this->assertEquals("Bob", $prenom, "getPrenom does not affect the right value.");
    }

    public function testSetNoSecu()
    {
        $patient = new Patient();
        $patient->setNoSecu("123056678922679");
        $nosecu = $patient->getNoSecu();

        $this->assertEquals("123056678922679", $nosecu, "setNoSecu does not affect the right value.");
    }

    public function testGetNoSecu()
    {
        $patient = new Patient();
        $patient->setNoSecu("123056678922679");
        $nosecu = $patient->getNoSecu();

        $this->assertEquals("123056678922679", $nosecu, "getNoSecu does not affect the right value.");
    }

    public function testSetAdresse()
    {
        $patient = new Patient();
        $patient->setAdresse("55 rue du jambon");
        $adresse = $patient->getAdresse();

        $this->assertEquals("55 rue du jambon", $adresse, "SetAdresse does not affect the right value.");
    }

    public function testGetAdresse()
    {
        $patient = new Patient();
        $patient->setAdresse("55 rue du jambon");
        $adresse = $patient->getAdresse();

        $this->assertEquals("55 rue du jambon", $adresse, "getAdresse does not affect the right value.");
    }

    public function testSetVille()
    {
        $patient = new Patient();
        $patient->setVille("Lille");
        $ville = $patient->getVille();

        $this->assertEquals("Lille", $ville, "setVille does not affect the right value.");
    }

    public function testGetVille()
    {
        $patient = new Patient();
        $patient->setVille("Lille");
        $ville = $patient->getVille();

        $this->assertEquals("Lille", $ville, "getVille does not affect the right value.");
    }

    public function testSetTelephone()
    {
        $patient = new Patient();
        $patient->setTelephone("0634080808");
        $telephone = $patient->getTelephone();

        $this->assertEquals("0634080808", $telephone, "setTelephone does not affect the right value.");
    }

    public function testGetTelephone()
    {
        $patient = new Patient();
        $patient->setTelephone("0634080808");
        $telephone = $patient->getTelephone();

        $this->assertEquals("0634080808", $telephone, "getTelephone does not affect the right value.");
    }

    public function testSetMail()
    {
        $patient = new Patient();
        $patient->setMail("Bdupont@yahoo.gb");
        $mail = $patient->getMail();

        $this->assertEquals("Bdupont@yahoo.gb", $mail, "setMail does not affect the right value.");
    }

    public function testGetMail()
    {
        $patient = new Patient();
        $patient->setMail("Bdupont@yahoo.gb");
        $mail = $patient->getMail();

        $this->assertEquals("Bdupont@yahoo.gb", $mail, "getMail does not affect the right value.");
    }

    public function testSetSexe()
    {
        $patient = new Patient();
        $patient->setSexe("H");
        $sexe = $patient->getSexe();

        $this->assertEquals("H", $sexe, "setSexe does not affect the right value.");
    }

    public function testGetSexe()
    {
        $patient = new Patient();
        $patient->setSexe("H");
        $sexe = $patient->getSexe();

        $this->assertEquals("H", $sexe, "getSexe does not affect the right value.");
    }

    public function testSetDdn()
    {
        $patient = new Patient();
        $date = new DateTime();
        $date->setDate(1923, 06, 5);

        $patient->setDdn($date);
        $ddn = $patient->getDdn();

        $this->assertEquals($date, $ddn, "setDdn does not affect the right value.");
    }

    public function testGetDdn()
    {
        $patient = new Patient();
        $date = new DateTime();
        $date->setDate(1923, 06, 5);
        $patient->setDdn($date);
        $ddn = $patient->getDdn();

        $this->assertEquals($date, $ddn, "getDdn does not affect the right value.");
    }


    public function testNomIsInvalidMax()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setNom("BOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOB");
        $errors = $validator->validate($patient);

        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your name cannot be longer than 50 characters", $errors[0]->getMessage());
        //console.log($errors[0]->getMessage());
    }
    public function testNomIsInvalidMin()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setNom("");
        $errors = $validator->validate($patient);

        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your name must be at least 1 characters long", $errors[0]->getMessage());
    }
    public function testNomIsInvalidReg()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setNom("DUpont5");
        $errors = $validator->validate($patient);

        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your name cannot contain a number", $errors[0]->getMessage());
    }

    public function testNomIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setNom("DUPOND");
        $errors = $validator->validate($patient);

        $this->assertEquals(0, count($errors), "Name is not valid");
    }
    public function testPrenomIsInvalidMin()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setPrenom("");
        $errors = $validator->validate($patient);

        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your surname must be at least 1 characters long", $errors[0]->getMessage());
    }
    public function testPrenomIsInvalidMax()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setPrenom("BOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOB");
        $errors = $validator->validate($patient);

        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your surname cannot be longer than 50 characters", $errors[0]->getMessage());
        //console.log($errors[0]->getMessage());
    }
    public function testPrenomIsInvalidReg()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setPrenom("DUpont5");
        $errors = $validator->validate($patient);

        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your surname cannot contain a number", $errors[0]->getMessage());
    }

    public function testPrenomIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setPrenom("DUPOND");
        $errors = $validator->validate($patient);

        $this->assertEquals(0, count($errors), "surName is not valid");
    }

    public function testNoSecuIsInvalidReg()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setNoSecu("151515");
        $errors = $validator->validate($patient);

        $this->assertEquals(1, count($errors), "Numero de securite sociale doit contenir exactement 15 chiffres");
        $this->assertEquals("Numero de securite sociale invalide", $errors[0]->getMessage());
    }

    public function testNoSecuIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setNoSecu("151511515115151");
        $errors = $validator->validate($patient);

        $this->assertEquals(0, count($errors), "Numero de securite sociale invalide");
    }

    public function testAdresseIsInvalidMax()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setAdresse("70 rue du foin70 rue du foin70 rue du foin70 rue du foin70 rue du foin70 rue du foin70 rue du foin");
        $errors = $validator->validate($patient);
        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your adress cannot be longer than 50 characters", $errors[0]->getMessage());
    }

    public function testAdresseIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setAdresse("70 rue du foin");
        $errors = $validator->validate($patient);

        $this->assertEquals(0, count($errors), "surName is not valid");
    }


    public function testVilleIsInvalidMax()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setVille("LilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLilleLille");
        $errors = $validator->validate($patient);
        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your city cannot be longer than 60 characters", $errors[0]->getMessage());
    }


    public function testVilleIsInvalidReg()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setVille("70LilleLilleLilleLilleLille");
        $errors = $validator->validate($patient);
        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your city cannot contain a number", $errors[0]->getMessage());
    }

    public function testVilleIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setVille("Lille");
        $errors = $validator->validate($patient);

        $this->assertEquals(0, count($errors), "ville is not valid");
    }

    public function testTelephoneIsInvalidReg()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setTelephone("06 39 08 09 0885ASDDF");
        $errors = $validator->validate($patient);
        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Numero de telephone invalide", $errors[0]->getMessage());
    }

    public function testTelephoneIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setTelephone("06-39-08-09-08");
        $errors = $validator->validate($patient);

        $this->assertEquals(0, count($errors), "Numero de telephone invalide");
    }
    public function testMailIsInvalid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setMail("B@O@iu@y.gb");
        $errors = $validator->validate($patient);
        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("The email is not a valid email.", $errors[0]->getMessage());
    }

    public function testMailIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setMail("BOBDUP@moiliuy.gb");
        $errors = $validator->validate($patient);

        $this->assertEquals(0, count($errors), "Mail invalide");
    }
    public function testSexeIsInvalid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setSexe("femme");
        $errors = $validator->validate($patient);
        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("The gender is not valid.", $errors[0]->getMessage());
    }

    public function testSexeIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $patient->setSexe("Femme");
        $errors = $validator->validate($patient);

        $this->assertEquals(0, count($errors), "Sexe invalide");
    }
    
    public function testDdnIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Patient();
        $date = new DateTime();
        $date->setDate(2022, 06, 5);
        $patient->setDdn($date);
        $errors = $validator->validate($patient);

        $this->assertEquals(0, count($errors), "Sexe invalide");
    }
}
