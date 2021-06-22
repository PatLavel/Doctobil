<?php

namespace App\Service;

use App\DTO\DocteurDTO;
use App\Mapper\DocteurMapper;
use App\Repository\DocteurRepository;
use Doctrine\ORM\EntityManagerInterface;

class DocteurService
{

    private $DocteurRepository;
    private $entityManager;

    public function __construct(
        DocteurRepository $repo,
        EntityManagerInterface $manager
    ) {
        $this->DocteurRepository = $repo;
        $this->entityManager = $manager;
    }


    public function findAll()
    {
        $Docteurs = $this->DocteurRepository->findAll();
        $DocteurDTOs = [];
        foreach ($Docteurs as $Docteur) {
            $mapper = new DocteurMapper();
            $DocteurDTO = $mapper->convertDocteurEntityToDocteurDTO($Docteur);
            $DocteurDTOs[] = $DocteurDTO;
        }
        return $DocteurDTOs;
    }

    public function save(DocteurDTO $DocteurDTO)
    {

        $DocteurToSave = (new DocteurMapper)->convertDocteurDTOToDocteurEntity($DocteurDTO);
        $this->entityManager->persist($DocteurToSave);
        $this->entityManager->flush();
        return true;
    }
    

    public function remove(int $id)
    {

        $docteur = $this->DocteurRepository->find($id);
        $this->entityManager->remove($docteur);
        $this->entityManager->flush();
        
        return true;
    }
}
