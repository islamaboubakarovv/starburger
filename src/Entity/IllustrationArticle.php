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
     * @ORM\Column(type="integer")
     */
    private $idArticle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseImage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdArticle(): ?int
    {
        return $this->idArticle;
    }

    public function setIdArticle(int $idArticle): self
    {
        $this->idArticle = $idArticle;

        return $this;
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
}
