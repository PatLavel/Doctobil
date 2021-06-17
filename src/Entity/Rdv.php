<?php

namespace App\Entity;

use App\Repository\RdvRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RdvRepository::class)
 */
class Rdv
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * 
     */
    private $date;

    /**
     * @ORM\Column(type="time")
     *
     */
    private $heure;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Choice({"Domicile", "Cabinet"},
     * message = "Lieu invalide")
     */
    private $lieu;
    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="RdvPat")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idPat;

    /**
     * @ORM\ManyToOne(targetEntity=Docteur::class, inversedBy="RdvDoc")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdDoc;



    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdPat(): ?Patient
    {
        return $this->idPat;
    }

    public function setIdPat(?Patient $idPat): self
    {
        $this->idPat = $idPat;

        return $this;
    }

    public function getIdDoc(): ?Docteur
    {
        return $this->IdDoc;
    }

    public function setIdDoc(?Docteur $IdDoc): self
    {
        $this->IdDoc = $IdDoc;

        return $this;
    }
}
