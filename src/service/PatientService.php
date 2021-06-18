<?php

namespace App\Service;

use App\Repository\PatientRepository;
use Doctrine\ORM\EntityManagerInterface;

class PatientService
{
    private $PatientRepository;
    private $manager;

    public function __construct(PatientRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->PatientRepository = $repository;
        $this->manager = $entityManager;
    }


    public function FindBy()
    {
        return $this->PatientRepository->testFindOneBy();
    }

    public function Find($id)
    {
        return $this->PatientRepository->testFindOneBy($id);
    }

}