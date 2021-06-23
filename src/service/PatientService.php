<?php

namespace App\Service;

use App\DTO\PatientDTO;
use App\Entity\Patient;
use App\Mapper\PatientMapper;
use App\Repository\PatientRepository;
use Doctrine\ORM\EntityManagerInterface;

class PatientService
{
    private $patientRepository;
    private $entityManager;

    public function __construct(
        PatientRepository $repo,
        EntityManagerInterface $manager
    ) {
        $this->patientRepository = $repo;
        $this->entityManager = $manager;
    }


    public function FindBy()
    {
        return $this->patientRepository->testFindOneBy();
    }

    public function Find($id)
    {
        return $this->patientRepository->testFindOneBy($id);
    }

    public function findAll()
    {
        $patients = $this->patientRepository->findAll();
        $patientDTOs = [];
        foreach ($patients as $patient) {
            $mapper = new PatientMapper();
            $patientDTO = $mapper->convertPatientEntityToPatientDTO($patient);
            $patientDTOs[] = $patientDTO;
        }
        return $patientDTOs;
    }

    public function save(PatientDTO $patientDTO)
    {
        $bob = new Patient;
        $patientToSave = (new PatientMapper)->convertPatientDTOToPatientEntity($patientDTO,$bob);
        $this->entityManager->persist($patientToSave);
        $this->entityManager->flush();
        return true;
    }

    public function remove(int $id)
    {

        $patient = $this->patientRepository->find($id);
        $this->entityManager->remove($patient);
        $this->entityManager->flush();

        return true;
    }

    public function put(PatientDTO $patientDTO,Patient $patientToChange)
    {
        //$patientToChange = $this->patientRepository->find($id);
        $patientToPut = (new PatientMapper)->convertPatientDTOToPatientEntity($patientDTO,$patientToChange);
        $this->entityManager->persist($patientToPut);
        $this->entityManager->flush();
        
        
        return true;
    }
}
