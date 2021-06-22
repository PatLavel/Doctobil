<?php

namespace App\Service;

use App\DTO\RdvDTO;
use App\Mapper\RdvMapper;
use App\Repository\RdvRepository;
use App\Repository\DocteurRepository;
use App\Repository\PatientRepository;
use Doctrine\ORM\EntityManagerInterface;

class RdvService
{

    
    private $patientRepository;
    private $docteurRepository;
    private $entityManager;
    public function __construct(RdvRepository $repository, 
    EntityManagerInterface $entityManager,
    DocteurRepository $docteurRepository,
    PatientRepository $patientRepository)
    {
        $this->RdvRepository = $repository;
        $this->docteurRepository = $docteurRepository;
        $this->patientRepository = $patientRepository;

        $this->entityManager = $entityManager;
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

    public function create(RdvDTO $rdvDTO)
    {
        $selectedDocteur = $this->docteurRepository->find($rdvDTO->getIdDoc());
        $selectedPatient = $this->patientRepository->find($rdvDTO->getIdPat());
        if ($selectedDocteur == null || $selectedPatient == null) {
            return false;
        }
        $rdvToSave = (new RdvMapper)->convertRdvDTOToRdvEntity($rdvDTO);
        $rdvToSave->setIdDoc($selectedDocteur);
        $rdvToSave->setIdPat($selectedPatient);
        //dd($rdvToSave);
        $this->entityManager->persist($rdvToSave);
        $this->entityManager->flush();
        return True;
    }

    public function remove(int $id)
    {

        $Rdv = $this->RdvRepository->find($id);
        $this->entityManager->remove($Rdv);
        $this->entityManager->flush();
        
        return true;
    }
}