<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BilleterieRepository")
 */
class Billeterie
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
    private $nbr_place_vendu;

    public function getId()
    {
        return $this->id;
    }

    public function getNbrPlaceVendu(): ?int
    {
        return $this->nbr_place_vendu;
    }

    public function setNbrPlaceVendu(int $nbr_place_vendu): self
    {
        $this->nbr_place_vendu = $nbr_place_vendu;

        return $this;
    }
}
