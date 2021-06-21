<?php

namespace App\Service;

use App\Repository\DocteurRepository;
use Doctrine\ORM\EntityManagerInterface;

class DocteurService
{
    private $DocteurRepository;
    private $manager;

    public function __construct(DocteurRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->DocteurRepository = $repository;
        $this->manager = $entityManager;
    }

    public function find(array $id)
    {
        return $this->DocteurRepository->findOneBy($id);
    }
    public function findBy(array $tab)
    {
        return $this->DocteurRepository->findOneBy($tab);
    }
    public function findAll()
    {
        return $this->DocteurRepository->findOneBy();
    }
}