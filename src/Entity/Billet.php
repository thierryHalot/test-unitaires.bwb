<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BilletRepository")
 */
class Billet
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
    private $total;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbr_dispo;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="billets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tarif")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tarif;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Billeterie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $billeterie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Zone")
     * @ORM\JoinColumn(nullable=false)
     */
    private $zone;

    public function getId()
    {
        return $this->id;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getNbrDispo(): ?int
    {
        return $this->nbr_dispo;
    }

    public function setNbrDispo(int $nbr_dispo): self
    {
        $this->nbr_dispo = $nbr_dispo;

        return $this;
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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getTarif(): ?Tarif
    {
        return $this->tarif;
    }

    public function setTarif(?Tarif $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getBilleterie(): ?Billeterie
    {
        return $this->billeterie;
    }

    public function setBilleterie(?Billeterie $billeterie): self
    {
        $this->billeterie = $billeterie;

        return $this;
    }

    public function getZone(): ?Zone
    {
        return $this->zone;
    }

    public function setZone(?Zone $zone): self
    {
        $this->zone = $zone;

        return $this;
    }
}
