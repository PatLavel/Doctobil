<?php

namespace App\Mapper;

use App\DTO\RdvDTO;
use App\Entity\Rdv;

class RdvMapper
{

    public function convertRdvEntityToRdvDTO(Rdv $Rdv): RdvDTO
    {
        $DocteurMapper = new DocteurMapper();
        $theDocteur = $Rdv->getIdDoc();
        $PatientMapper = new PatientMapper();
        $thePatient = $Rdv->getIdPat();
        $pDTO = (new RdvDTO())->setId($Rdv->getId())
            ->setDate($Rdv->getDate())->setHeure($Rdv->getHeure())->setLieu($Rdv->getLieu())
            ->setDocteurDTO($DocteurMapper->convertDocteurEntityToDocteurDTO($theDocteur))
            ->setPatientDTO($PatientMapper->convertPatientEntityToPatientDTO($thePatient));
        return $pDTO;
    }

    public function convertRdvDTOToRdvEntity(RdvDTO $RdvDTO): Rdv
    {
        $DocteurMapper = new DocteurMapper();
        $PatientMapper = new PatientMapper();
        $Rdv = new Rdv();
        $Rdv->setDate($Rdv->getDate())->setHeure($Rdv->getHeure())->setLieu($RdvDTO->getLieu());
        $Rdv->setIdDoc($DocteurMapper->convertDocteurDTOToDocteurEntity($RdvDTO->getDocteurDTO()));
        $Rdv->setIdPat($PatientMapper->convertPatientDTOToPatientEntity($RdvDTO->getPatientDTO()));

        return $Rdv;
    }
}
