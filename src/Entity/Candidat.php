<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CandidatRepository")
 */
class Candidat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cognoms;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telefon;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\oferta", inversedBy="candidats")
     */
    private $oferta;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $estudis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCognoms(): ?string
    {
        return $this->cognoms;
    }

    public function setCognoms(?string $cognoms): self
    {
        $this->cognoms = $cognoms;

        return $this;
    }

    public function getTelefon(): ?int
    {
        return $this->telefon;
    }

    public function setTelefon(?int $telefon): self
    {
        $this->telefon = $telefon;

        return $this;
    }

    public function getOferta(): ?oferta
    {
        return $this->oferta;
    }

    public function setOferta(?oferta $oferta): self
    {
        $this->oferta = $oferta;

        return $this;
    }

    public function getEstudis(): ?string
    {
        return $this->estudis;
    }

    public function setEstudis(?string $estudis): self
    {
        $this->estudis = $estudis;

        return $this;
    }
}
