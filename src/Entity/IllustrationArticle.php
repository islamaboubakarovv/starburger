<?php

namespace App\Entity;

use App\Repository\IllustrationArticleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IllustrationArticleRepository::class)
 */
class IllustrationArticle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseImage;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="illustrationarticle")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresseImage(): ?string
    {
        return $this->adresseImage;
    }

    public function setAdresseImage(string $adresseImage): self
    {
        $this->adresseImage = $adresseImage;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }
}
