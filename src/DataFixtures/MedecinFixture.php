<?php

namespace App\DataFixtures;

use App\Entity\Docteur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MedecinFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i > 6; $i++) {
        $patient = new Docteur();
        $patient->setNom("Docteur")
            ->setPrenom("Jean")
            ->setAdresse("44 rue du truc")
            ->setVille("Ville")
            ->setSpecialite("Neurologie")
            ->setTelephone("0235659584")
            ->setMail("mail@mail.com");
        $manager->persist($patient);
    }

    $manager->flush();
    }
}
