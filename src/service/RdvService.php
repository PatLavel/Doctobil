<?php

namespace App\Service;

use App\DTO\RdvDTO;
use App\Mapper\RdvMapper;
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

    public function create(RdvDTO $rdvDTO)
    {

        //$DocteurToSave = (new DocteurMapper)->convertDocteurDTOToDocteurEntity($DocteurDTO);

        // $repoDoc = $this->getDoctrine()->getRepository(Docteur::class);
        // $repoPat = $this->getDoctrine()->getRepository(Patient::class);
        // if ($repoDoc->find($rdv->getIdDoc()->getId()) == null) {
        //     $manager->persist($rdv->getIdDoc());
        // } else {
        //     $doc = $repoDoc->find($rdv->getIdDoc()->getId());
        //     $rdv->setIdDoc($doc);
        // }
        // if ($repoPat->find($rdv->getIdPat()->getId()) == null) {
        //     $manager->persist($rdv->getIdPat());
        // } else {
        //     $pat = $repoPat->find($rdv->getIdPat()->getId());
        //     $rdv->setIdPat($pat);
        // }



        $selectedDocteur = $this->DocteurRepository->find($rdvDTO->getDocteurId());
        $selectedPatient = $this->PatientRepository->find($rdvDTO->getPatientId());
        if ($selectedDocteur == null || $selectedPatient == null) {
            return false;
        }
        $rdvToSave = (new RdvMapper)->convertRdvDTOToRdvEntity($rdvDTO);
        $rdvToSave->setIdDoc($selectedDocteur);
        $rdvToSave->setIdDoc($selectedPatient);

        $this->entityManager->persist($rdvToSave);
        $this->entityManager->flush();
        return True;
    }
}