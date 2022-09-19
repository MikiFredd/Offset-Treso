<?php

namespace App\Entity;

use App\Repository\TiersRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\TimestampableTrait;

#[ORM\Entity(repositoryClass: TiersRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Tiers
{

    use TimestampableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $intitule = null;

    #[ORM\Column(length: 255)]
    private ?string $raison_sociale = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $address = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $postal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $num_cc = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $siege = null;

    #[ORM\Column(length: 255)]
    private ?string $Code = null;

    #[ORM\ManyToOne(inversedBy: 'tiers')]
    private ?TypeTiers $typeTiers = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raison_sociale;
    }

    public function setRaisonSociale(string $raison_sociale): self
    {
        $this->raison_sociale = $raison_sociale;

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostal(): ?string
    {
        return $this->postal;
    }

    public function setPostal(?string $postal): self
    {
        $this->postal = $postal;

        return $this;
    }

    public function getNumCc(): ?string
    {
        return $this->num_cc;
    }

    public function setNumCc(?string $num_cc): self
    {
        $this->num_cc = $num_cc;

        return $this;
    }

    public function getSiege(): ?string
    {
        return $this->siege;
    }

    public function setSiege(?string $siege): self
    {
        $this->siege = $siege;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->Code;
    }

    public function setCode(string $Code): self
    {
        $this->Code = $Code;

        return $this;
    }

    public function getTypeTiers(): ?TypeTiers
    {
        return $this->typeTiers;
    }

    public function setTypeTiers(?TypeTiers $typeTiers): self
    {
        $this->typeTiers = $typeTiers;

        return $this;
    }
}
