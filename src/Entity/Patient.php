<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Length(
     *      min = 1,
     *      max = 50,
     *      minMessage = "Your name must be at least {{ limit }} characters long",
     *      maxMessage = "Your name cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     *      )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your name cannot contain a number")
     * 
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\Length(
     *      min = 1,
     *      max = 50,
     *      minMessage = "Your surname must be at least {{ limit }} characters long",
     *      maxMessage = "Your surname cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     *      )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your surname cannot contain a number")
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Regex("/^[0-9]{15}$/",
     *     match=true,
     *     message="Numero de securite sociale invalide")
     */
    private $noSecu;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Length(
     *      max = 50,
     *      maxMessage = "Your adress cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     *      )
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=60)
     * @Assert\Length(
     *      max = 60,
     *      maxMessage = "Your city cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     *      )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your city cannot contain a number")
     * 
     */
    private $ville;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(allowNull = true)
     * @Assert\Regex("/^[0-9]{2}[\s.-][0-9]{2}[\s.-][0-9]{2}[\s.-][0-9]{2}[\s.-][0-9]{2}$/",
     *     match=true,
     *     message="Numero de telephone invalide")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Email(
     *     message = "The email is not a valid email."
     * )
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=50)
     * 
     * @Assert\Choice({"Homme", "Femme", "F", "M", "Autre"}
     * ,message = "The gender is not valid.")
     */
    private $sexe;

    /**
     * @ORM\Column(type="date")
     * @Assert\Type(
     * type="dateTimeInterface",
     * message = "BAD DATE")
     */
    private $ddn;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNoSecu(): ?int
    {
        return $this->noSecu;
    }

    public function setNoSecu(int $noSecu): self
    {
        $this->noSecu = $noSecu;

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

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
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

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDdn(): ?\DateTimeInterface
    {
        return $this->ddn;
    }

    public function setDdn(\DateTimeInterface $ddn): self
    {
        $this->ddn = $ddn;

        return $this;
    }
}
