<?php

namespace App\Entity;

use App\Repository\DocteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     *      minMessage = "Your Docteur name must be at least {{ limit }} characters long",
     *      maxMessage = "Your Docteur name cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     *      )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your Docteur name cannot contain a number")
     * 
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\Length(
     *      min = 1,
     *      max = 50,
     *      minMessage = "Your Docteur surname must be at least {{ limit }} characters long",
     *      maxMessage = "Your Docteur surname cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     *      )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your Docteur surname cannot contain a number")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      max = 50,
     *      maxMessage = "Your Ville name cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     *      )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your Ville name cannot contain a number")
     * 
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Length(
     *      max = 50,
     *      maxMessage = "Your Specialité name cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     *      )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your Specialité name cannot contain a number"
     * )
     */
    private $specialite;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Length(
     *      max = 50,
     *      maxMessage = "Your Adresse cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     *      )
     */
    private $adresse;
    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Email(
     *     message = "The Docteur email is not a valid email."
     * )
     */
    private $mail;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(allowNull = true)
     * @Assert\Regex(
     *     pattern="/^[0-9]{2}[\s.-][0-9]{2}[\s.-][0-9]{2}[\s.-][0-9]{2}[\s.-][0-9]{2}$/",
     *     match=true,
     *     message="Numero de telephone invalide"
     * )
     */
    private $telephone;

    // /**
    //  * @ORM\OneToMany(targetEntity=Rdv::class, mappedBy="IdDoc")
    //  */
    // private $RdvDoc;

    // public function __construct()
    // {
    //     $this->RdvDoc = new ArrayCollection();
    // }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id)
    {
        $this->id = $id;

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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    // /**
    //  * @return Collection|Rdv[]
    //  */
    // public function getRdvDoc(): Collection
    // {
    //     return $this->RdvDoc;
    // }

    // public function addRdvDoc(Rdv $rdvDoc): self
    // {
    //     if (!$this->RdvDoc->contains($rdvDoc)) {
    //         $this->RdvDoc[] = $rdvDoc;
    //         $rdvDoc->setIdDoc($this);
    //     }

    //     return $this;
    // }

    // public function removeRdvDoc(Rdv $rdvDoc): self
    // {
    //     if ($this->RdvDoc->removeElement($rdvDoc)) {
    //         // set the owning side to null (unless already changed)
    //         if ($rdvDoc->getIdDoc() === $this) {
    //             $rdvDoc->setIdDoc(null);
    //         }
    //     }

    //     return $this;
    // }
}
