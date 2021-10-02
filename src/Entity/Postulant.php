<?php

namespace App\Entity;

use App\Repository\PostulantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostulantRepository::class)
 */
class Postulant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cv;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lettreMotivation;

    public function getId(): ?int
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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(?string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getLettreMotivation(): ?string
    {
        return $this->lettreMotivation;
    }

    public function setLettreMotivation(?string $lettreMotivation): self
    {
        $this->lettreMotivation = $lettreMotivation;

        return $this;
    }
}
