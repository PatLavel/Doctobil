<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Rdv;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RdvTest extends KernelTestCase
{


    public function testSetDate()
    {
        $Rdv = new Rdv();
        $dateRdv= new DateTime();
        $dateRdv -> setDate(2021,06,22);

        $Rdv->setDate($dateRdv);
        $date = $Rdv->getDate();

        $this->assertEquals($dateRdv, $date, "setDate does not affect the right value.");
    }

    public function testGetDate()
    {
        $Rdv = new Rdv();
        $dateRdv= new DateTime();
        $dateRdv -> setDate(2021,06,22);

        $Rdv->setDate($dateRdv);
        $date = $Rdv->getDate();

        $this->assertEquals($dateRdv, $date, "GetDate does not affect the right value.");
    }

    public function testSetHeure()
    {
        $Rdv = new Rdv();
        $time= new DateTime();
        $time -> setTime(16,0);

        $Rdv->setHeure($time);
        $heure = $Rdv->getHeure();

        $this->assertEquals($time, $heure, "setHeure does not affect the right value.");
    }

    public function testGetHeure()
    {
        $Rdv = new Rdv();
        $time= new DateTime();
        $time -> setTime(16,0);
        $Rdv->setHeure($time);
        $heure = $Rdv->getHeure();

        $this->assertEquals($time, $heure, "getHeure does not affect the right value.");
    }

    public function testSetLieu()
    {
        $Rdv = new Rdv();
        $Rdv->setLieu("Domicile");
        $lieu = $Rdv->getLieu();

        $this->assertEquals("Domicile", $lieu, "setLieu does not affect the right value.");
    }

    public function testGetSexe()
    {
        $Rdv = new Rdv();
        $Rdv->setLieu("Domicile");
        $lieu = $Rdv->getLieu();

        $this->assertEquals("Domicile", $lieu, "getLieu does not affect the right value.");
    }
    

    
    // public function testDateIsInvalid()
    // {
    //     $kernel = self::bootKernel();
    //     $validator = $kernel->getContainer()->get('validator');
    //     $patient = new Rdv();
    //     $date = new DateTime();
    //     $date->setDate(2022, 66, 55);
    //     $patient->setDate($date);
    //     $errors = $validator->validate($patient);
    //     $this->assertEquals(1, count($errors), "test1");
    //     $this->assertEquals("BAD RDV DATE", $errors[0]->getMessage());
    // }

    public function testDateIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Rdv();
        $date = new DateTime();
        $date->setDate(2022, 06, 5);
        $patient->setDate($date);
        $errors = $validator->validate($patient);
        $this->assertEquals(0, count($errors), "BAD RDV DATE");
    }
    // public function testHeureIsInvalid()
    // {
    //     $kernel = self::bootKernel();
    //     $validator = $kernel->getContainer()->get('validator');
    //     $patient = new Rdv();
    //     $time = new DateTime();
    //     $time->setTime(26,70);
    //     $patient->setHeure($time);
    //     $errors = $validator->validate($patient);
    //     $this->assertEquals(1, count($errors), "test1");
    //     $this->assertEquals("BAD RDV TIME", $errors[0]->getMessage());
    // }

    public function testHeureIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Rdv();
        $time = new DateTime();
        $time->setTime(16,20);
        $patient->setHeure($time);
        $errors = $validator->validate($patient);
        $this->assertEquals(0, count($errors), "BAD RDV TIME");
    }
    
    public function testLieuIsInvalid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Rdv();
        $patient->setLieu("Domichile");
        $errors = $validator->validate($patient);
        $this->assertEquals(1, count($errors), "test1");
        $this->assertEquals("Lieu invalide", $errors[0]->getMessage());
    }

    public function testLieuIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $patient = new Rdv();
        $patient->setLieu("Domicile");
        $errors = $validator->validate($patient);
        $this->assertEquals(0, count($errors), "Lieu invalide");
    }
}