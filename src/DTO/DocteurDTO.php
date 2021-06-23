<?php

use OpenApi\Annotations as OA;

namespace App\DTO;

/**
 * Class Docteur
 *
 * @OA\Schema(
 *     description="DocteurDTO",
 *     title="DocteurDTO",
 *     required={"nom", "prenom", "mail", "telephone", "ville", "adresse", "specialite"}
 * )
 */

class DocteurDTO
{
    private $id;


     /**
     * @OA\Property(
     *     type="string",
     *     description="Docteur nom",
     *     title="Docteur nom",
     * )
     *
     * @var string
     */
    private $nom;

    /**
    * @OA\Property(
    *     type="string",
    *     description="Docteur prenom",
    *     title="Docteur prenom"
    * )
    *
    * @var string
    */
    private $prenom;

    /**
    * @OA\Property(
    *     type="string",
    *     description="Docteur mail",
    *     title="Docteur mail"
    * )
    *
    * @var string
    */
    private $mail;

    /**
    * @OA\Property(
    *     type="string",
    *     description="Docteur specialite",
    *     title="Docteur specialite"
    * )
    *
    * @var string
    */
    private $specialite;

    /**
    * @OA\Property(
    *     type="string",
    *     description="Docteur telephone",
    *     title="Docteur telephone"
    * )
    *
    * @var string
    */
    private $telephone;

    /**
    * @OA\Property(
    *     type="string",
    *     description="Docteur ville",
    *     title="Docteur ville"
    * )
    *
    * @var string
    */
    private $ville;

    /**
    * @OA\Property(
    *     type="string",
    *     description="Docteur adresse",
    *     title="Docteur adresse"
    * )
    *
    * @var string
    */
    private $adresse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    
    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
    
    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }
    
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }
    
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }
    
    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }
    // public function getMedecinDTO(): ?MedecinDTO
    // {
    //     return $this->medecinDTO;
    // }

    // public function setMedecinDTO(?MedecinDTO $medecin): self
    // {
    //     $this->medecinDTO = $medecin;

    //     return $this;
    // }

    // public function getMedecinId(): ?int
    // {
    //     return $this->medecinId;
    // }

    // public function setMedecinId(?int $id): self
    // {
    //     $this->medecinId = $id;

    //     return $this;
    // }
}
