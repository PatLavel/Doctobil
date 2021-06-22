<?php

namespace App\Service;

use App\DTO\DocteurDTO;
use App\Entity\Docteur;
use App\Mapper\DocteurMapper;
use App\Repository\DocteurRepository;
use Doctrine\ORM\EntityManagerInterface;

class DocteurService
{

    private $docteurRepository;
    private $entityManager;

    public function __construct(
        DocteurRepository $repo,
        EntityManagerInterface $manager
    ) {
        $this->docteurRepository = $repo;
        $this->entityManager = $manager;
    }


    public function findAll()
    {
        $docteurs = $this->docteurRepository->findAll();
        $docteurDTOs = [];
        foreach ($docteurs as $docteur) {
            $mapper = new DocteurMapper();
            $docteurDTO = $mapper->convertDocteurEntityToDocteurDTO($docteur);
            $docteurDTOs[] = $docteurDTO;
        }
        return $docteurDTOs;
    }

    public function save(DocteurDTO $docteurDTO)
    {

        $docteurToSave = (new DocteurMapper)->convertDocteurDTOToDocteurEntity($docteurDTO);
        $this->entityManager->persist($docteurToSave);
        $this->entityManager->flush();
        return true;
    }
    

    public function remove(int $id)
    {

        $docteur = $this->docteurRepository->find($id);
        $this->entityManager->remove($docteur);
        $this->entityManager->flush();
        
        return true;
    }
    
    public function put(int $id,DocteurDTO $docteurDTO)
    {
        //$docteurToPut = $this->docteurRepository->find($id);
        $docteurToPut = (new DocteurMapper)->convertDocteurDTOToDocteurEntity($docteurDTO);
        dd($docteurDTO);
        $this->entityManager->persist($docteurToPut);
        $this->entityManager->flush();
        
        return true;
    }
}
