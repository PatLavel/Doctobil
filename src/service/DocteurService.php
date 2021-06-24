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
        $bob = new Docteur;
        $docteurToSave = (new DocteurMapper)->convertDocteurDTOToDocteurEntity($docteurDTO, $bob);
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
    
    public function put(Docteur $docteurToChange, DocteurDTO $docteurDTO )
    {
        

        $docteurToPut = (new DocteurMapper)->convertDocteurDTOToDocteurEntity($docteurDTO, $docteurToChange);
        $this->entityManager->persist($docteurToPut);
        $this->entityManager->flush();
        
        
        return true;
    }
}
