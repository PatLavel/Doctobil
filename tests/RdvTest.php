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
    

    
    
}