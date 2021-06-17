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
        for ($i = 1; $i < 6; $i++) {
            $patient = new Patient();
            $ddn = new DateTime;
            $ddn->setDate(1978, 06, 07);
            $patient->setNom("Patient")
                ->setPrenom("Jean")
                ->setNoSecu(123456789012345)
                ->setAdresse("44 rue du truc")
                ->setVille("Ville")
                ->setTelephone("0235659584")
                ->setMail("mail@mail.com")
                ->setSexe("Homme")
                ->setDdn($ddn);
            $manager->persist($patient);

            $doc = new Docteur();
            $doc->setNom("Docteur")
                ->setPrenom("Jean")
                ->setAdresse("44 rue du truc")
                ->setVille("Ville")
                ->setSpecialite("Neurologie")
                ->setTelephone("0235659584")
                ->setMail("mail@mail.com");
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
