<?php

namespace App\Service;

use App\DTO\PatientDTO;
use App\Mapper\PatientMapper;
use App\Repository\PatientRepository;
use Doctrine\ORM\EntityManagerInterface;

class PatientService
{
    private $patientRepository;
    private $medecinRepository;
    private $entityManager;

    public function __construct(
        PatientRepository $repo,
        EntityManagerInterface $manager,
    ) {
        $this->patientRepository = $repo;
        $this->entityManager = $manager;
    }


    public function FindBy()
    {
        return $this->PatientRepository->testFindOneBy();
    }

    public function Find($id)
    {
        return $this->PatientRepository->testFindOneBy($id);
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
        $patientToSave = (new PatientMapper)->convertPatientDTOToPatientEntity($patientDTO);
        $this->entityManager->persist($patientToSave);
        $this->entityManager->flush();
        return true;
    }

    public function remove(int $id)
    {

        $patient = $this->PatientRepository->find($id);
        $this->entityManager->remove($patient);
        $this->entityManager->flush();

        return true;
    }
}
