<?php

namespace App\Mapper;

use App\DTO\PatientDTO;
use App\Entity\Patient;

class PatientMapper
{

    public function convertPatientEntityToPatientDTO(Patient $patient): PatientDTO
    {
        $pDTO = (new PatientDTO())->setId($patient->getId())
            ->setNom($patient->getNom())
            ->setPrenom($patient->getPrenom())
            ->setAdresse($patient->getAdresse())
            ->setNoSecu($patient->getNoSecu())
            ->setVille($patient->getVille())
            ->setSexe($patient->getSexe())
            ->setTelephone($patient->getTelephone())
            ->setMail($patient->getMail())
            ->setDdn($patient->getDdn());
        return $pDTO;
    }

    public function convertPatientDTOToPatientEntity(PatientDTO $patientDTO, Patient $patientToChange): Patient
    {

        if (!$patientToChange) {
            $patient = new Patient();
            $patient->setNom($patientDTO->getNom())
                ->setPrenom($patientDTO->getPrenom())
                ->setAdresse($patientDTO->getAdresse())
                ->setVille($patientDTO->getVille())
                ->setSexe($patientDTO->getSexe())
                ->setNoSecu($patientDTO->getNoSecu())
                ->setTelephone($patientDTO->getTelephone())
                ->setMail($patientDTO->getMail())
                ->setDdn($patientDTO->getDdn());

            return $patient;
        } else {

            $patientToChange->setNom($patientDTO->getNom())
                ->setPrenom($patientDTO->getPrenom())
                ->setMail($patientDTO->getMail())
                ->setTelephone($patientDTO->getTelephone())
                ->setVille($patientDTO->getVille())
                ->setSexe($patientDTO->getSexe())
                ->setDdn($patientDTO->getDdn())
                ->setNoSecu($patientDTO->getNoSecu())
                ->setAdresse($patientDTO->getAdresse());

            return $patientToChange;
        }
    }
}
