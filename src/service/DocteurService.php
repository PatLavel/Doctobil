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


    public function Find(array $id)
    {
        return $this->DocteurRepository->testFindOneBy($id);
    }
    public function FindBy(array $tab)
    {
        return $this->DocteurRepository->testFindOneBy($tab);
    }
    public function FindAll()
    {
        return $this->DocteurRepository->testFindOneBy();
    }

}