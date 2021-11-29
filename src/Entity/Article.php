<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $importance;

    /**
     * @ORM\ManyToOne(targetEntity=Artisan::class, inversedBy="auteur")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $artisan;

    /**
     * @ORM\OneToMany(targetEntity=IllustrationArticle::class, mappedBy="article", orphanRemoval=true)
     */
    private $illustrationarticle;

    public function __construct()
    {
        $this->illustrationarticle = new ArrayCollection();
    }

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

    public function getImportance(): ?int
    {
        return $this->importance;
    }

    public function setImportance(int $importance): self
    {
        $this->importance = $importance;

        return $this;
    }

    public function getArtisan(): ?Artisan
    {
        return $this->artisan;
    }

    public function setArtisan(?Artisan $artisan): self
    {
        $this->artisan = $artisan;

        return $this;
    }

    /**
     * @return Collection|IllustrationArticle[]
     */
    public function getIllustrationarticle(): Collection
    {
        return $this->illustrationarticle;
    }

    public function addIllustrationarticle(IllustrationArticle $illustrationarticle): self
    {
        if (!$this->illustrationarticle->contains($illustrationarticle)) {
            $this->illustrationarticle[] = $illustrationarticle;
            $illustrationarticle->setArticle($this);
        }

        return $this;
    }

    public function removeIllustrationarticle(IllustrationArticle $illustrationarticle): self
    {
        if ($this->illustrationarticle->removeElement($illustrationarticle)) {
            // set the owning side to null (unless already changed)
            if ($illustrationarticle->getArticle() === $this) {
                $illustrationarticle->setArticle(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->titre;
    }
}
