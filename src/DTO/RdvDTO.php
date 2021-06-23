<?php

namespace App\DTO;

use OpenApi\Annotations as OA;

/**
 * Class Rdv
 *
 *
 *
 * @OA\Schema(
 *     description="RdvDTO",
 *     title="RdvDTO",
 *     required={"date", "heure", "lieu", "idDoc", "idPat"}
 * )
 */


class RdvDTO
{

    private $id;

    /**
    * @OA\Property(
    *     description="Rdv date",
    *     title="Rdv date"
    * )
    */
    private $date;
    
    /**
    * @OA\Property(
    *     type="string",
    *     description="Rdv lieu",
    *     title="Rdv lieu"
    * )
    *
    *  
    */
    private $lieu;
    
    /**
    * @OA\Property(
    *     description="Rdv heure",
    *     title="Rdv heure"
    * )
    *
    */
    private $heure;
    
   
    /**
    * @OA\Property(
    *     type="DocteurDTO",
    *     description="Rdv idDoc",
    *     title="Rdv idDoc",
    *     ref="#/components/schemas/DocteurDTO"
    * )
    */
    private $idDoc;
    
    /**
    * @OA\Property(
    *     type="PatientDTO",
    *     description="Rdv idPat",
    *     title="Rdv idPat",
    *     ref="#/components/schemas/PatientDTO"
    * )
    */
    private $idPat;
    
    /**
    * @OA\Property(
    *     description="Rdv docteurDTO",
    *     title="Rdv docteurDTO",
    *     ref="#/components/schemas/DocteurDTO"
    * )
    */
    private $docteurDTO;
    /**
    * @OA\Property(
    *     description="Rdv patientDTO",
    *     title="Rdv patientDTO",
    *     ref="#/components/schemas/PatientDTO"
    * )
    */ 
    private $patientDTO;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDocteurDTO(): ?DocteurDTO
    {
        return $this->docteurDTO;
    }

    public function setDocteurDTO(?DocteurDTO $docteur): self
    {
        $this->docteurDTO = $docteur;

        return $this;
    }

    public function getIdDoc(): ?int
    {
        return $this->idDoc;
    }

    public function setIdDoc(?int $id): self
    {
        $this->idDoc = $id;

        return $this;
    }

    public function getPatientDTO(): ?PatientDTO
    {
        return $this->patientDTO;
    }

    public function setPatientDTO(?PatientDTO $patient): self
    {
        $this->patientDTO = $patient;

        return $this;
    }

    public function getIdPat(): ?int
    {
        return $this->idPat;
    }

    public function setIdPat(?int $id): self
    {
        $this->idPat = $id;

        return $this;
    }
}