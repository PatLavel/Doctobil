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

    public function convertRdvDTOToRdvEntity(RdvDTO $rdvDTO, Rdv $rdvToChange): Rdv
    {
        // // $DocteurMapper = new DocteurMapper();
        // // $PatientMapper = new PatientMapper();
        // $Rdv = new Rdv();
        // $Rdv->setDate($RdvDTO->getDate())->setHeure($RdvDTO->getHeure())->setLieu($RdvDTO->getLieu());

        // return $Rdv;


        if (!$rdvToChange) {
            $rdv = new Rdv();
            $rdv->setDate($rdvDTO->getDate())
                ->setHeure($rdvDTO->getHeure())
                ->setLieu($rdvDTO->getLieu())
                ->setIdPat($rdvDTO->getIdPat())
                ->setIdDoc($rdvDTO->getIdDoc());

            return $rdv;
        } else {

            $rdvToChange->setDate($rdvDTO->getDate())
                ->setHeure($rdvDTO->getHeure())
                ->setLieu($rdvDTO->getLieu())
                ->setIdPat($rdvDTO->getIdPat())
                ->setIdDoc($rdvDTO->getIdDoc());

            return $rdvToChange;
        }
    }
}
