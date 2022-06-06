<?php

namespace App\Entity;

use App\Repository\PostulantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=PostulantRepository::class)
 * @Vich\Uploadable
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
     * @var string
     */
    private $cv;

    /**
     * @Vich\UploadableField(mapping="cv_pdf", fileNameProperty="cv")
     * @var File
     */
    private $cvFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $lm;
    
    /**
     * @Vich\UploadableField(mapping="lm_pdf", fileNameProperty="lm")
     * @var File
     */
    private $lmFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $infoComp;

    /**
     * @ORM\ManyToOne(targetEntity=Offre::class, inversedBy="postulant")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $offre;

    public function __construct()
    {
        $this->postulant = new ArrayCollection();
    }

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

    public function setCv($cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function setCvFile(File $cv = null)
    {
        $this->cvFile = $cv;
    }

    public function getCvFile()
    {
        return $this->cvFile;
    }

    public function setLmFile(File $lm = null)
    {
        $this->lmFile = $lm;
    }

    public function getLmFile()
    {
        return $this->lmFile;
    }

    public function getLm(): ?string
    {
        return $this->lm;
    }

    public function setLm($lm): self
    {
        $this->lm = $lm;

        return $this;
    }

    public function getInfoComp(): ?string
    {
        return $this->infoComp;
    }

    public function setInfoComp(string $infoComp): self
    {
        $this->infoComp = $infoComp;

        return $this;
    }

    public function getPostulant(): ?self
    {
        return $this->postulant;
    }

    public function setPostulant(?self $postulant): self
    {
        $this->postulant = $postulant;

        return $this;
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
}
