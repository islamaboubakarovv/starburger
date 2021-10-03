<?php

namespace App\Entity;

use App\Repository\OffrePostulantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffrePostulantRepository::class)
 */
class OffrePostulant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Offre::class, inversedBy="offre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $offre;

    /**
     * @ORM\ManyToOne(targetEntity=Postulant::class, inversedBy="postulant")
     * @ORM\JoinColumn(nullable=false)
     */
    private $postulant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOffre(): ?Offre
    {
        return $this->offre;
    }

    public function setOffre(?Offre $offre): self
    {
        $this->offre = $offre;

        return $this;
    }

    public function getPostulant(): ?Postulant
    {
        return $this->postulant;
    }

    public function setPostulant(?Postulant $postulant): self
    {
        $this->postulant = $postulant;

        return $this;
    }
}
