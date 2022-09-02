<?php

namespace App\Entity;

use App\Repository\TreasuryAccountRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\TimestampableTrait;

#[ORM\Entity(repositoryClass: TreasuryAccountRepository::class)]
#[ORM\HasLifecycleCallbacks]

class TreasuryAccount
{
    use TimestampableTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code_tiers = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $echeance_reglement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $intitule_tiers = null;

    #[ORM\Column(length: 255)]
    private ?string $type_compte = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $types_tiers = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeTiers(): ?string
    {
        return $this->code_tiers;
    }

    public function setCodeTiers(?string $code_tiers): self
    {
        $this->code_tiers = $code_tiers;

        return $this;
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

    public function getEcheanceReglement(): ?\DateTimeInterface
    {
        return $this->echeance_reglement;
    }

    public function setEcheanceReglement(?\DateTimeInterface $echeance_reglement): self
    {
        $this->echeance_reglement = $echeance_reglement;

        return $this;
    }

    public function getIntituleTiers(): ?string
    {
        return $this->intitule_tiers;
    }

    public function setIntituleTiers(?string $intitule_tiers): self
    {
        $this->intitule_tiers = $intitule_tiers;

        return $this;
    }

    public function getTypeCompte(): ?string
    {
        return $this->type_compte;
    }

    public function setTypeCompte(string $type_compte): self
    {
        $this->type_compte = $type_compte;

        return $this;
    }

    public function getTypesTiers(): ?string
    {
        return $this->types_tiers;
    }

    public function setTypesTiers(?string $types_tiers): self
    {
        $this->types_tiers = $types_tiers;

        return $this;
    }
}
