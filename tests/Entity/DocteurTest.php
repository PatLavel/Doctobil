<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Docteur;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DocteurTest extends KernelTestCase
{

    public function testSetNom()
    {
        $Docteur = new Docteur();
        $Docteur->setNom("DUFION");
        $nom = $Docteur->getNom();

        $this->assertEquals("DUFION", $nom, "setNom does not affect the right value.");
    }

    public function testGetNom()
    {
        $Docteur = new Docteur();
        $Docteur->setNom("DUFION");
        $nom = $Docteur->getNom();

        $this->assertEquals("DUFION", $nom, "getNom returns a bad value.");
    }
    public function testSetPrenom()
    {
        $Docteur = new Docteur();
        $Docteur->setPrenom("Charles");
        $prenom = $Docteur->getPrenom();

        $this->assertEquals("Charles", $prenom, "setPrenom does not affect the right value.");
    }

    public function testGetPrenom()
    {
        $Docteur = new Docteur();
        $Docteur->setPrenom("Charles");
        $prenom = $Docteur->getPrenom();

        $this->assertEquals("Charles", $prenom, "getPrenom does not affect the right value.");
    }



    public function testSetAdresse()
    {
        $Docteur = new Docteur();
        $Docteur->setAdresse("55 rue du marmiton");
        $adresse = $Docteur->getAdresse();

        $this->assertEquals("55 rue du marmiton", $adresse, "SetAdresse does not affect the right value.");
    }

    public function testGetAdresse()
    {
        $Docteur = new Docteur();
        $Docteur->setAdresse("55 rue du marmiton");
        $adresse = $Docteur->getAdresse();

        $this->assertEquals("55 rue du marmiton", $adresse, "getAdresse does not affect the right value.");
    }

    public function testSetVille()
    {
        $Docteur = new Docteur();
        $Docteur->setVille("Lille");
        $ville = $Docteur->getVille();

        $this->assertEquals("Lille", $ville, "setVille does not affect the right value.");
    }

    public function testGetVille()
    {
        $Docteur = new Docteur();
        $Docteur->setVille("Lille");
        $ville = $Docteur->getVille();

        $this->assertEquals("Lille", $ville, "getVille does not affect the right value.");
    }

    public function testSetTelephone()
    {
        $Docteur = new Docteur();
        $Docteur->setTelephone("0634585858");
        $telephone = $Docteur->getTelephone();

        $this->assertEquals("0634585858", $telephone, "setTelephone does not affect the right value.");
    }

    public function testGetTelephone()
    {
        $Docteur = new Docteur();
        $Docteur->setTelephone("0634585858");
        $telephone = $Docteur->getTelephone();

        $this->assertEquals("0634585858", $telephone, "getTelephone does not affect the right value.");
    }

    public function testSetMail()
    {
        $Docteur = new Docteur();
        $Docteur->setMail("cfion@protonmail.fr");
        $mail = $Docteur->getMail();

        $this->assertEquals("cfion@protonmail.fr", $mail, "setMail does not affect the right value.");
    }

    public function testGetMail()
    {
        $Docteur = new Docteur();
        $Docteur->setMail("cfion@protonmail.fr");
        $mail = $Docteur->getMail();

        $this->assertEquals("cfion@protonmail.fr", $mail, "getMail does not affect the right value.");
    }

    public function testSetSpecialite()
    {
        $Docteur = new Docteur();
        $Docteur->setSpecialite("Neurochirurgie");
        $specialite = $Docteur->getSpecialite();

        $this->assertEquals("Neurochirurgie", $specialite, "setSpecialite does not affect the right value.");
    }

    public function testGetSpecialite()
    {
        $Docteur = new Docteur();
        $Docteur->setSpecialite("Neurochirurgie");
        $specialite = $Docteur->getSpecialite();

        $this->assertEquals("Neurochirurgie", $specialite, "getSpecialite does not affect the right value.");
    }



    public function testNomIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setNom("DUPOND");
        $errors = $validator->validate($doc);

        $this->assertEquals(0, count($errors), "Docteur Name is not valid");
    }
    public function testNomIsInvalidMax()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setNom("BOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOB");
        $errors = $validator->validate($doc);

        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your Docteur name cannot be longer than 50 characters", $errors[0]->getMessage());
    }
    public function testNomIsInvalidMin()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setNom("");
        $errors = $validator->validate($doc);

        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your Docteur name must be at least 1 characters long", $errors[0]->getMessage());
    }
    public function testNomIsInvalidReg()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setNom("DUpont5");
        $errors = $validator->validate($doc);

        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your Docteur name cannot contain a number", $errors[0]->getMessage());
    }





    public function testPrenomIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setPrenom("Claude");
        $errors = $validator->validate($doc);

        $this->assertEquals(0, count($errors), "Docteur Surame is not valid");
    }

    public function testPrenomIsInvalidMax()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setPrenom("BOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOB");
        $errors = $validator->validate($doc);

        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your Docteur surname cannot be longer than 50 characters", $errors[0]->getMessage());
    }
    public function testPrenomIsInvalidMin()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setPrenom("");
        $errors = $validator->validate($doc);

        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your Docteur surname must be at least 1 characters long", $errors[0]->getMessage());
    }
    public function testPrenomIsInvalidReg()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setPrenom("DUpont5");
        $errors = $validator->validate($doc);

        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your Docteur surname cannot contain a number", $errors[0]->getMessage());
    }






    public function testVilleIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setVille("DUPOND");
        $errors = $validator->validate($doc);

        $this->assertEquals(0, count($errors), "Docteur Ville is not valid");
    }
    public function testVilleIsInvalidMax()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setVille("BOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOB");
        $errors = $validator->validate($doc);

        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your Ville name cannot be longer than 50 characters", $errors[0]->getMessage());
    }
    public function testVilleIsInvalidReg()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setVille("Claude5");
        $errors = $validator->validate($doc);

        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your Ville name cannot contain a number", $errors[0]->getMessage());
    }




    public function testSpecialiteIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setSpecialite("Neurologie");
        $errors = $validator->validate($doc);

        $this->assertEquals(0, count($errors), "Docteur Specialité is not valid");
    }
    public function testSpecialiteIsInvalidMax()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setSpecialite("BOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOB");
        $errors = $validator->validate($doc);

        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your Specialité name cannot be longer than 50 characters", $errors[0]->getMessage());
    }







    public function testAdresseIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setAdresse("35 rue du foin");
        $errors = $validator->validate($doc);

        $this->assertEquals(0, count($errors), "Docteur Adresse is not valid");
    }
    public function testSAdresseIsInvalidMax()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setAdresse("BOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOBBOBOB");
        $errors = $validator->validate($doc);

        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Your Adresse cannot be longer than 50 characters", $errors[0]->getMessage());
    }





    public function testMailIsInvalid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setMail("B@O@iu@y.gb");
        $errors = $validator->validate($doc);
        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("The Docteur email is not a valid email.", $errors[0]->getMessage());
    }

    public function testMailIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setMail("BOBDUP@moiliuy.gb");
        $errors = $validator->validate($doc);

        $this->assertEquals(0, count($errors), "Mail invalide");
    }



    public function testTelephoneIsInvalidReg()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setTelephone("06 39 08 09 0885ASDDF");
        $errors = $validator->validate($doc);
        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Numero de telephone invalide", $errors[0]->getMessage());
    }

    public function testTelephoneIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $doc = new Docteur();
        $doc->setTelephone("06-39-08-09-08");
        $errors = $validator->validate($doc);

        $this->assertEquals(0, count($errors), "Numero de telephone invalide");
    }
}
