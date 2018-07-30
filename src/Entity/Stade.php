<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StadeRepository")
 */
class Stade
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbr_place_dispo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ClubFoot")
     * @ORM\JoinColumn(nullable=false)
     */
    private $club;

    public function getId()
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNbrPlaceDispo(): ?int
    {
        return $this->nbr_place_dispo;
    }

    public function setNbrPlaceDispo(int $nbr_place_dispo): self
    {
        $this->nbr_place_dispo = $nbr_place_dispo;

        return $this;
    }

    public function getClub(): ?ClubFoot
    {
        return $this->club;
    }

    public function setClub(?ClubFoot $club): self
    {
        $this->club = $club;

        return $this;
    }
}
