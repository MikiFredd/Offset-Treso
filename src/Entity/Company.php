<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\TimestampableTrait;

#[ORM\Entity(repositoryClass: CompanyRepository::class)]
#[ORM\HasLifecycleCallbacks]

class Company
{

    use TimestampableTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $CompanyName = null;

    #[ORM\Column(length: 255)]
    private ?string $Forme = null;

    #[ORM\Column(length: 255)]
    private ?string $Activities = null;

    #[ORM\Column(length: 255)]
    private ?string $Numero_RCC = null;

    #[ORM\Column(length: 255)]
    private ?string $Numero_CC = null;

    #[ORM\Column(length: 255)]
    private ?string $Telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $Siege_social = null;

    #[ORM\Column(precision: 20,scale: 2)]
    private ?string $Capital_social = null;

    #[ORM\Column(length: 255)]
    private ?string $Gerant = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $Annee_debut_activ = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->CompanyName;
    }

    public function setCompanyName(string $CompanyName): self
    {
        $this->CompanyName = $CompanyName;

        return $this;
    }

    public function getForme(): ?string
    {
        return $this->Forme;
    }

    public function setForme(string $Forme): self
    {
        $this->Forme = $Forme;

        return $this;
    }

    public function getActivities(): ?string
    {
        return $this->Activities;
    }

    public function setActivities(string $Activities): self
    {
        $this->Activities = $Activities;

        return $this;
    }

    public function getNumeroRCC(): ?string
    {
        return $this->Numero_RCC;
    }

    public function setNumeroRCC(string $Numero_RCC): self
    {
        $this->Numero_RCC = $Numero_RCC;

        return $this;
    }

    public function getNumeroCC(): ?string
    {
        return $this->Numero_CC;
    }

    public function setNumeroCC(string $Numero_CC): self
    {
        $this->Numero_CC = $Numero_CC;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getSiegeSocial(): ?string
    {
        return $this->Siege_social;
    }

    public function setSiegeSocial(string $Siege_social): self
    {
        $this->Siege_social = $Siege_social;

        return $this;
    }

    public function getCapitalSocial(): ?string
    {
        return $this->Capital_social;
    }

    public function setCapitalSocial(string $Capital_social): self
    {
        $this->Capital_social = $Capital_social;

        return $this;
    }

    public function getGerant(): ?string
    {
        return $this->Gerant;
    }

    public function setGerant(string $Gerant): self
    {
        $this->Gerant = $Gerant;

        return $this;
    }

    public function getAnneeDebutActiv(): ?\DateTime
    {
        return $this->Annee_debut_activ;
    }

    public function setAnneeDebutActiv(\DateTime $Annee_debut_activ): self
    {
        $this->Annee_debut_activ = $Annee_debut_activ;

        return $this;
    }

}
