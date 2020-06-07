<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OfertaRepository")
 */
class Oferta
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
    private $descripcio;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $dataPub;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Empresa", inversedBy="ofertas")
     */
    private $idEmpresa;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Candidato", inversedBy="idOferta")
     */
    private $candidato;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Candidat", mappedBy="oferta")
     */
    private $candidats;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titol;

    public function __construct()
    {
        $this->candidats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcio(): ?string
    {
        return $this->descripcio;
    }

    public function setDescripcio(?string $descripcio): self
    {
        $this->descripcio = $descripcio;

        return $this;
    }

    public function getDataPub(): ?string
    {
        return $this->dataPub;
    }

    public function setDataPub(?string $dataPub): self
    {
        $this->dataPub = $dataPub;

        return $this;
    }

    public function getIdEmpresa(): ?Empresa
    {
        return $this->idEmpresa;
    }

    public function setIdEmpresa(?Empresa $idEmpresa): self
    {
        $this->idEmpresa = $idEmpresa;

        return $this;
    }

    public function getCandidato(): ?Candidato
    {
        return $this->candidato;
    }

    public function setCandidato(?Candidato $candidato): self
    {
        $this->candidato = $candidato;

        return $this;
    }

    /**
     * @return Collection|Candidat[]
     */
    public function getCandidats(): Collection
    {
        return $this->candidats;
    }

    public function addCandidat(Candidat $candidat): self
    {
        if (!$this->candidats->contains($candidat)) {
            $this->candidats[] = $candidat;
            $candidat->setOferta($this);
        }

        return $this;
    }

    public function removeCandidat(Candidat $candidat): self
    {
        if ($this->candidats->contains($candidat)) {
            $this->candidats->removeElement($candidat);
            // set the owning side to null (unless already changed)
            if ($candidat->getOferta() === $this) {
                $candidat->setOferta(null);
            }
        }

        return $this;
    }

    public function getTitol(): ?string
    {
        return $this->titol;
    }

    public function setTitol(?string $titol): self
    {
        $this->titol = $titol;

        return $this;
    }
}
