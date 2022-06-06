<?php

namespace App\Entity;
//modifier artisan pour qu'il puisse se connecter à la page easyadmin : gestion de sécurité etc
use App\Repository\ArtisanRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Guard\PasswordAuthenticatedInterface;

/**
 * @ORM\Entity(repositoryClass=ArtisanRepository::class)
 */
class Artisan implements UserInterface,PasswordAuthenticatedUserInterface
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=false,unique=true)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $mdp;
    public function getId(): ?int
    {
        return $this->id;
    }

     /**
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->mail;

    }
    public function getUsername(): string
    {
        return (string) $this->mail;
    }
    public function getSalt(): ?string
    {
        return null;
    }
    public function getPassword(): string
    {
        return $this->mdp;
    }
    public function setPassword(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="artisan", orphanRemoval=true)
     */
    private $auteur;

    public function __construct()
    {
        $this->auteur = new ArrayCollection();
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

    public function getNom(): ?string
    {
        return $this->nom;
    }
    public function getRoles(): array
    {
        //$roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_ADMIN';

        return array_unique($roles);
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getAuteur(): Collection
    {
        return $this->auteur;
    }

    public function addAuteur(Article $auteur): self
    {
        if (!$this->auteur->contains($auteur)) {
            $this->auteur[] = $auteur;
            $auteur->setArtisan($this);
        }

        return $this;
    }

    public function removeAuteur(Article $auteur): self
    {
        if ($this->auteur->removeElement($auteur)) {
            // set the owning side to null (unless already changed)
            if ($auteur->getArtisan() === $this) {
                $auteur->setArtisan(null);
            }
        }

        return $this;
    }
}
