<?php

namespace App\DataFixtures;

use App\Entity\Patient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PatientFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i > 6; $i++) {
            $patient = new Patient();
            $patient->setNom("Patient")
                ->setPrenom("Jean")
                ->setNoSecu(123456789012345)
                ->setAdresse("44 rue du truc")
                ->setVille("Ville")
                ->setTelephone("0235659584")
                ->setMail("mail@mail.com")
                ->setSexe("Homme");
            $manager->persist($patient);
        }

        $manager->flush();
    }
}
