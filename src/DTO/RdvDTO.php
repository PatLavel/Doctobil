<?php

namespace App\DTO;

class RdvDTO
{

    private $id;
    private $date;
    private $lieu;
    private $heure;
    private $docteurId;
    private $patientId;
    private $docteurDTO;
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
        return $this->DocteurDTO;
    }

    public function setDocteurDTO(?DocteurDTO $docteur): self
    {
        $this->docteurDTO = $docteur;

        return $this;
    }

    public function getDocteurId(): ?int
    {
        return $this->docteurId;
    }

    public function setDocteurId(?int $id): self
    {
        $this->docteurId = $id;

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

    public function getPatientId(): ?int
    {
        return $this->patientId;
    }

    public function setPatientId(?int $id): self
    {
        $this->patientId = $id;

        return $this;
    }
}