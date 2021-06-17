<?php

namespace App\Service;

use App\Repository\RdvRepository;
use Doctrine\ORM\EntityManagerInterface;

class RdvService
{
    public function __construct(RdvRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->RdvRepository = $repository;
        $this->manager = $entityManager;
    }


    public function FindBy(array $tab)
    {
        return $this->RdvRepository->testFindOneBy($tab);
    }
}