<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $contenu;

    /**
     * @ORM\Column(type="date")
     */
    private $datePubli;

    /**
     * @ORM\Column(type="integer")
     */
    private $auteur;

    /**
     * @ORM\Column(type="integer")
     */
    private $importance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDatePubli(): ?\DateTimeInterface
    {
        return $this->datePubli;
    }

    public function setDatePubli(\DateTimeInterface $datePubli): self
    {
        $this->datePubli = $datePubli;

        return $this;
    }

    public function getAuteur(): ?int
    {
        return $this->auteur;
    }

    public function setAuteur(int $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getImportance(): ?int
    {
        return $this->importance;
    }

    public function setImportance(int $importance): self
    {
        $this->importance = $importance;

        return $this;
    }
}
