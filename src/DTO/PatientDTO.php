<?php

namespace App\DTO;

use DateTime;
use OpenApi\Annotations as OA;


/**
 *  @OA\Schema(
 *     description="PatientDTO",
 *     title="Le PatientDTO",
 *     required={"nom", "prenom", "noSecu", "ddn", "adresse", "ville", "telephone", "mail"},
 *     
 * )
 */
class PatientDTO
{
    private $id;
    /**
     * @OA\Property(
     *    
     *     description="NomPatientDTO",
     *     title="NomPatientDTO"
     * )
     *  
     */
    private $nom;
    /**
     * @OA\Property(
     *     type = "integer",
     *     description="NoSecuPatientDTO",
     *     title="NoSecuPatientDTO"
     * )
     *  
     */
    private $noSecu;
    /**
     * @OA\Property(
     *     
     *     description="PrenomPatientDTO",
     *     title="PrenomPatientDTO"
     * )
     *  
     */
    private $prenom;
    /**
     * @OA\Property(
     *    
     *     description="AdressePatientDTO",
     *     title="AdressePatientDTO"
     * )
     *  
     */
    private $adresse;
    /**
     * @OA\Property(
     *    
     *     description="VillePatientDTO",
     *     title="VillePatientDTO"
     * )
     *  
     */
    private $ville;
    /**
     * @OA\Property(
     *    
     *     description="MailPatientDTO",
     *     title="MailPatientDTO"
     * )
     *  
     */
    private $mail;
    /**
     * @OA\Property(
     *    
     *     description="TelephonePatientDTO",
     *     title="TelephonePatientDTO"
     * )
     *  
     */
    private $telephone;
    /**
     * @OA\Property(
     *    
     *     description="SexePatientDTO",
     *     title="SexePatientDTO"
     * )
     *  
     */
    private $sexe;
    /**
     * @OA\Property(
     *    
     *     description="DdnPatientDTO",
     *     title="DdnPatientDTO"
     * )
     *  
     */
    private $ddn;


    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId(string $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of noSecu
     */
    public function getNoSecu(): string
    {
        return $this->noSecu;
    }

    /**
     * Set the value of noSecu
     *
     * @return  self
     */
    public function setNoSecu(string $noSecu)
    {
        $this->noSecu = $noSecu;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of adresse
     */
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */
    public function setAdresse(string $adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of ville
     */
    public function getVille(): string
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */
    public function setVille(string $ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of mail
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail(string $mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of telephone
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */
    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of sexe
     */
    public function getSexe(): string
    {
        return $this->sexe;
    }

    /**
     * Set the value of sexe
     *
     * @return  self
     */
    public function setSexe(string $sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get the value of ddn
     */
    public function getDdn(): DateTime
    {
        return $this->ddn;
    }

    /**
     * Set the value of ddn
     *
     * @return  self
     */
    public function setDdn(DateTime $ddn)
    {
        $this->ddn = $ddn;

        return $this;
    }
}
