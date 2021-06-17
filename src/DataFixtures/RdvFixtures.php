<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Rdv;
use App\Entity\Docteur;
use App\Entity\Patient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class RdvFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
            $tab=["a","b","c","d","e"];
        for ($i = 1; $i < 6; $i++) {
            $patient = new Patient();
            $ddn = new DateTime;
            $ddn->setDate(1978, 06, 07);
            $patient->setNom("Patient $tab[$i]")
                ->setPrenom("Jean $tab[$i]")
                ->setNoSecu(123456789012345)
                ->setAdresse("4$i rue du truc")
                ->setVille("Ville $tab[$i]")
                ->setTelephone("023565958$i")
                ->setMail("mail $tab[$i]@mail.com")
                ->setSexe("Homme")
                ->setDdn($ddn);
            $manager->persist($patient);

            $doc = new Docteur();
            $doc->setNom("Docteur $tab[$i]")
                ->setPrenom("Jean $tab[$i]")
                ->setAdresse("5$i rue du truc")
                ->setVille("Ville $tab[$i]")
                ->setSpecialite("Neurologie")
                ->setTelephone("023565958$i")
                ->setMail("mail $tab[$i]@mail.com");
            $manager->persist($doc);

            $rdv = new Rdv();
            $date = new DateTime;
            $date->setdate(2021, 05, 05);
            $date->setTime(12, 00);
            $rdv->setDate($date);
            $rdv->setHeure($date);
            $rdv->setLieu("Cabinet");
            $rdv->setIdPat($patient);
            $rdv->setIdDoc($doc);
            $manager->persist($rdv);
        }

        $manager->flush();
    }


}
