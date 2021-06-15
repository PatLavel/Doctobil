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
    
    
    

    

}