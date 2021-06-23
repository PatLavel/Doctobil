<?php

namespace App\Mapper;

use App\DTO\DocteurDTO;
use App\Entity\Docteur;

class DocteurMapper
{

    public function convertDocteurEntityToDocteurDTO(Docteur $Docteur): DocteurDTO
    {
        $dDTO = (new DocteurDTO())->setId($Docteur->getId())
        ->setNom($Docteur->getNom())->setPrenom($Docteur->getPrenom())->setVille($Docteur->getVille())
        ->setSpecialite($Docteur->getSpecialite())->setMail($Docteur->getMail())
        ->setAdresse($Docteur->getAdresse())->setTelephone($Docteur->getTelephone());
        return $dDTO;
    }

    public function convertDocteurDTOToDocteurEntity(DocteurDTO $DocteurDTO): Docteur
    {
        $Docteur = new Docteur();
        $Docteur->setNom($DocteurDTO->getNom())
        ->setPrenom($DocteurDTO->getPrenom())
        ->setVille($DocteurDTO->getVille())
        ->setSpecialite($DocteurDTO->getSpecialite())
        ->setMail($DocteurDTO->getMail())
        ->setAdresse($DocteurDTO->getAdresse())
        ->setTelephone($DocteurDTO->getTelephone());
        // $Docteur->setMedecin($medecinMapper->convertMedecinTOToMedecinEntity($DocteurDTO->getMedecinDTO()));

        return $Docteur;
    }
}
