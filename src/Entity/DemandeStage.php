<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DemandeStageRepository")
 */
class DemandeStage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="etudiantId", referencedColumnName="id",onDelete="CASCADE")
     */
    private $etudiantId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $disponibilite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    public function getId()
    {
        return $this->id;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getDisponibilite(): ?string
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(string $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEtudiantId(): ?User
    {
        return $this->etudiantId;
    }

    public function setEtudiantId(?User $etudiantId): self
    {
        $this->etudiantId = $etudiantId;

        return $this;
    }



}
