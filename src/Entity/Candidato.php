<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CandidatoRepository")
 */
class Candidato
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Oferta", mappedBy="candidato")
     */
    private $idOferta;

    public function __construct()
    {
        $this->idOferta = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Oferta[]
     */
    public function getIdOferta(): Collection
    {
        return $this->idOferta;
    }

    public function addIdOfertum(Oferta $idOfertum): self
    {
        if (!$this->idOferta->contains($idOfertum)) {
            $this->idOferta[] = $idOfertum;
            $idOfertum->setCandidato($this);
        }

        return $this;
    }

    public function removeIdOfertum(Oferta $idOfertum): self
    {
        if ($this->idOferta->contains($idOfertum)) {
            $this->idOferta->removeElement($idOfertum);
            // set the owning side to null (unless already changed)
            if ($idOfertum->getCandidato() === $this) {
                $idOfertum->setCandidato(null);
            }
        }

        return $this;
    }
}
