<?php

namespace App\Entity;

use App\Repository\DocteurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=DocteurRepository::class)
 */
class Docteur
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
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      max = 255,
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
     * @ORM\Column(type="string", length=50)
     * @Assert\Length(
     *      max = 50,
     *      maxMessage = "Your specialite cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     *      )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your specialite cannot contain a number"
     * )
     */
    private $specialite;

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
     * @ORM\Column(type="string", length=50)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     */
    private $mail;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * 
     * @Assert\Regex(
     *     pattern="/[0-9]{2}[\s.-][0-9]{2}[\s.-][0-9]{2}[\s.-][0-9]{2}[\s.-][0-9]{2}/",
     *     match=false,
     *     message="TEL bad"
     * )
     */
    private $telephone;

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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }
}
