<?php

namespace App\Entity;

use App\Repository\FundsRequestRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\TimestampableTrait;

#[ORM\Entity(repositoryClass: FundsRequestRepository::class)]
#[ORM\HasLifecycleCallbacks]
class FundsRequest
{

    use TimestampableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'fundsRequests')]
    private ?CashAccount $caisse = null;

    #[ORM\Column]
    private ?int $montant_depenses = null;

    #[ORM\Column]
    private ?int $solde_apres = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $objet = null;

    //Ici on parle du montant sollicité
    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $montant_lettres = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCaisse(): ?CashAccount
    {
        return $this->caisse;
    }

    public function setCaisse(?CashAccount $caisse): self
    {
        $this->caisse = $caisse;

        return $this;
    }

    public function getMontantDepenses(): ?int
    {
        return $this->montant_depenses;
    }

    public function setMontantDepenses(int $montant_depenses): self
    {
        $this->montant_depenses = $montant_depenses;

        return $this;
    }

    public function getSoldeApres(): ?int
    {
        return $this->solde_apres;
    }

    public function setSoldeApres(int $solde_apres): self
    {
        $this->solde_apres = $solde_apres;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getMontantLettres(): ?string
    {
        return $this->montant_lettres;
    }

    public function setMontantLettres(string $montant_lettres): self
    {
        $this->montant_lettres = $montant_lettres;

        return $this;
    }
}
