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

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $echeance_reglement = null;

    #[ORM\ManyToOne(inversedBy: 'treasuryAccounts')]
    private ?Tiers $Tiers = null;

    #[ORM\ManyToOne(inversedBy: 'treasuryAccounts')]
    private ?TypeCompte $typeCompte = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTiers(): ?Tiers
    {
        return $this->Tiers;
    }

    public function setTiers(?Tiers $Tiers): self
    {
        $this->Tiers = $Tiers;

        return $this;
    }

    public function getTypeCompte(): ?TypeCompte
    {
        return $this->typeCompte;
    }

    public function setTypeCompte(?TypeCompte $typeCompte): self
    {
        $this->typeCompte = $typeCompte;

        return $this;
    }

}
