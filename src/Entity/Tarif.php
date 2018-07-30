<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TarifRepository")
 */
class Tarif
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $plein_tarif;

    /**
     * @ORM\Column(type="integer")
     */
    private $etudiant;

    /**
     * @ORM\Column(type="integer")
     */
    private $enfant;

    public function getId()
    {
        return $this->id;
    }

    public function getPleinTarif(): ?int
    {
        return $this->plein_tarif;
    }

    public function setPleinTarif(int $plein_tarif): self
    {
        $this->plein_tarif = $plein_tarif;

        return $this;
    }

    public function getEtudiant(): ?int
    {
        return $this->etudiant;
    }

    public function setEtudiant(int $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    public function getEnfant(): ?int
    {
        return $this->enfant;
    }

    public function setEnfant(int $enfant): self
    {
        $this->enfant = $enfant;

        return $this;
    }
}
