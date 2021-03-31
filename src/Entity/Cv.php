<?php

namespace App\Entity;

use App\Repository\CvRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CvRepository::class)
 */
class Cv
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveauEtude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $experiencePro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logicielMaitrise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $domaineEnquete;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $roles = [];

    /**
     * @ORM\OneToMany(targetEntity=Offre::class, mappedBy="cv")
     */
    private $Offre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $formation;

    public function __construct()
    {
        if($this->Offre == null){
            $this->Offre = "Pas d'offre";
        }
        $this->roles = ['ROLE_USER'];
        $this->Offre = new ArrayCollection();
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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getNiveauEtude(): ?string
    {
        return $this->niveauEtude;
    }

    public function setNiveauEtude(string $niveauEtude): self
    {
        $this->niveauEtude = $niveauEtude;

        return $this;
    }

    public function getExperiencePro(): ?string
    {
        return $this->experiencePro;
    }

    public function setExperiencePro(string $experiencePro): self
    {
        $this->experiencePro = $experiencePro;

        return $this;
    }

    public function getLogicielMaitrise(): ?string
    {
        return $this->logicielMaitrise;
    }

    public function setLogicielMaitrise(string $logicielMaitrise): self
    {
        $this->logicielMaitrise = $logicielMaitrise;

        return $this;
    }

    public function getDomaineEnquete(): ?string
    {
        return $this->domaineEnquete;
    }

    public function setDomaineEnquete(string $domaineEnquete): self
    {
        $this->domaineEnquete = $domaineEnquete;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(?array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return Collection|Offre[]
     */
    public function getOffre(): Collection
    {
        return $this->Offre;
    }

    public function addOffre(Offre $offre): self
    {
        if (!$this->Offre->contains($offre)) {
            $this->Offre[] = $offre;
            $offre->setCv($this);
        }

        return $this;
    }

    public function removeOffre(Offre $offre): self
    {
        if ($this->Offre->removeElement($offre)) {
            // set the owning side to null (unless already changed)
            if ($offre->getCv() === $this) {
                $offre->setCv(null);
            }
        }

        return $this;
    }

    public function getFormation(): ?string
    {
        return $this->formation;
    }

    public function setFormation(string $formation): self
    {
        $this->formation = $formation;

        return $this;
    }
}
