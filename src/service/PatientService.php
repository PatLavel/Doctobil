<?php

namespace App\ervice;

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
}