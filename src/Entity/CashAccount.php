<?php

namespace App\Entity;

use App\Entity\FundsRequest;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\TimestampableTrait;
use App\Repository\CashAccountRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: CashAccountRepository::class)]
#[ORM\HasLifecycleCallbacks]

class CashAccount
{
    use TimestampableTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $num_cpte = null;

    #[ORM\Column(nullable: true)]
    private ?int $solde_ouv = null;

    #[ORM\Column(nullable: true)]
    private ?int $plafond = null;

    #[ORM\Column(nullable: true)]
    private ?int $solde_plancher = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $caissier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $responsable = null;

    #[ORM\OneToMany(mappedBy: 'caisse', targetEntity: FundsRequest::class)]
    private Collection $fundsRequests;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Journal $codeJournal = null;

    public function __construct()
    {
        $this->fundsRequests = new ArrayCollection();
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

    public function getNumCpte(): ?string
    {
        return $this->num_cpte;
    }

    public function setNumCpte(string $num_cpte): self
    {
        $this->num_cpte = $num_cpte;

        return $this;
    }

    public function getSoldeOuv(): ?int
    {
        return $this->solde_ouv;
    }

    public function setSoldeOuv(?int $solde_ouv): self
    {
        $this->solde_ouv = $solde_ouv;

        return $this;
    }

    public function getPlafond(): ?int
    {
        return $this->plafond;
    }

    public function setPlafond(?int $plafond): self
    {
        $this->plafond = $plafond;

        return $this;
    }

    public function getSoldePlancher(): ?int
    {
        return $this->solde_plancher;
    }

    public function setSoldePlancher(?int $solde_plancher): self
    {
        $this->solde_plancher = $solde_plancher;

        return $this;
    }

    public function getCaissier(): ?string
    {
        return $this->caissier;
    }

    public function setCaissier(?string $caissier): self
    {
        $this->caissier = $caissier;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(?string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }


    /**
     * @return Collection<int, FundsRequest>
     */
    public function getFundsRequests(): Collection
    {
        return $this->fundsRequests;
    }

    public function addFundsRequest(FundsRequest $fundsRequest): self
    {
        if (!$this->fundsRequests->contains($fundsRequest)) {
            $this->fundsRequests->add($fundsRequest);
            $fundsRequest->setCaisse($this);
        }

        return $this;
    }

    public function removeFundsRequest(FundsRequest $fundsRequest): self
    {
        if ($this->fundsRequests->removeElement($fundsRequest)) {
            // set the owning side to null (unless already changed)
            if ($fundsRequest->getCaisse() === $this) {
                $fundsRequest->setCaisse(null);
            }
        }

        return $this;
    }

    public function getCodeJournal(): ?Journal
    {
        return $this->codeJournal;
    }

    public function setCodeJournal(?Journal $codeJournal): self
    {
        $this->codeJournal = $codeJournal;

        return $this;
    }

    public function __toString():string
    {
        return $this->getNom();
    }

}
