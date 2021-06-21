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


    
    public function find(array $id)
    {
        return $this->RdvRepository->findOneBy($id);
    }
    public function findBy(array $tab)
    {
        return $this->RdvRepository->findOneBy($tab);
    }
    public function findAll()
    {
        return $this->RdvRepository->findOneBy();
    }
}