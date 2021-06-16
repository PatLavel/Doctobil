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
     * @Assert\Type(
     * type="dateTimeInterface",
     * message = "BAD RDV DATE")
     */
    private $date;

    /**
     * @ORM\Column(type="time")
     * @Assert\Type(
     * type="dateTimeInterface",
     * message = "BAD RDV TIME")
     */
    private $heure;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Choice({"Domicile", "Cabinet"},
     * message = "Lieu invalide")
     */
    private $lieu;

    /**
     * @ORM\Column(type="integer")
     */
    private $idpat;

    /**
     * @ORM\Column(type="integer")
     */
    private $iddoc;

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

    public function getIdpat(): ?int
    {
        return $this->idpat;
    }

    public function setIdpat(int $idpat): self
    {
        $this->idpat = $idpat;

        return $this;
    }

    public function getIddoc(): ?int
    {
        return $this->iddoc;
    }

    public function setIddoc(int $iddoc): self
    {
        $this->iddoc = $iddoc;

        return $this;
    }
}
