<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
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
     * @ORM\Column(type="string", length=45)
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="boolean")
     */
    private $abonnement;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Abonnement", cascade={"persist", "remove"})
     */
    private $abonnement_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Billet", mappedBy="client", orphanRemoval=true)
     */
    private $billets;

    public function __construct()
    {
        $this->billets = new ArrayCollection();
    }

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getAbonnement(): ?bool
    {
        return $this->abonnement;
    }

    public function setAbonnement(bool $abonnement): self
    {
        $this->abonnement = $abonnement;

        return $this;
    }

    public function getAbonnementId(): ?Abonnement
    {
        return $this->abonnement_id;
    }

    public function setAbonnementId(?Abonnement $abonnement_id): self
    {
        $this->abonnement_id = $abonnement_id;

        return $this;
    }

    /**
     * @return Collection|Billet[]
     */
    public function getBillets(): Collection
    {
        return $this->billets;
    }

    public function addBillet(Billet $billet): self
    {
        if (!$this->billets->contains($billet)) {
            $this->billets[] = $billet;
            $billet->setClient($this);
        }

        return $this;
    }

    public function removeBillet(Billet $billet): self
    {
        if ($this->billets->contains($billet)) {
            $this->billets->removeElement($billet);
            // set the owning side to null (unless already changed)
            if ($billet->getClient() === $this) {
                $billet->setClient(null);
            }
        }

        return $this;
    }
}
