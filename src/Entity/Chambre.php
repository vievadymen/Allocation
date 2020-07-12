<?php

namespace App\Entity;

use App\Repository\ChambreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChambreRepository::class)
 */
class Chambre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numchambre;

    /**
     * @ORM\Column(type="integer")
     */
    private $numbatiment;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typechambre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumchambre(): ?string
    {
        return $this->numchambre;
    }

    public function setNumchambre(string $numchambre): self
    {
        $this->numchambre = $numchambre;

        return $this;
    }

    public function getNumbatiment(): ?int
    {
        return $this->numbatiment;
    }

    public function setNumbatiment(int $numbatiment): self
    {
        $this->numbatiment = $numbatiment;

        return $this;
    }

    public function getTypechambre(): ?string
    {
        return $this->typechambre;
    }

    public function setTypechambre(string $typechambre): self
    {
        $this->typechambre = $typechambre;

        return $this;
    }
}
