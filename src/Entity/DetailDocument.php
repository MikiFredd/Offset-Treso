<?php

namespace App\Entity;

use App\Repository\DetailDocumentRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\TimestampableTrait;

#[ORM\Entity(repositoryClass: DetailDocumentRepository::class)]
#[ORM\HasLifecycleCallbacks]
class DetailDocument
{

    use TimestampableTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $intitule = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reference = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $autreReference = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'detailDocuments')]
    private ?ReglementMode $modeReglement = null;

    #[ORM\Column(nullable: true)]
    private ?int $montant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $montantLettre = null;

    #[ORM\Column(nullable: true)]
    private ?int $montantTotal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $referenceDocument = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $libelle = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Document $document = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(?string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getAutreReference(): ?string
    {
        return $this->autreReference;
    }

    public function setAutreReference(?string $autreReference): self
    {
        $this->autreReference = $autreReference;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getModeReglement(): ?ReglementMode
    {
        return $this->modeReglement;
    }

    public function setModeReglement(?ReglementMode $modeReglement): self
    {
        $this->modeReglement = $modeReglement;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(?int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getMontantLettre(): ?string
    {
        return $this->montantLettre;
    }

    public function setMontantLettre(?string $montantLettre): self
    {
        $this->montantLettre = $montantLettre;

        return $this;
    }

    public function getMontantTotal(): ?int
    {
        return $this->montantTotal;
    }

    public function setMontantTotal(?int $montantTotal): self
    {
        $this->montantTotal = $montantTotal;

        return $this;
    }

    public function getReferenceDocument(): ?string
    {
        return $this->referenceDocument;
    }

    public function setReferenceDocument(?string $referenceDocument): self
    {
        $this->referenceDocument = $referenceDocument;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDocument(): ?Document
    {
        return $this->document;
    }

    public function setDocument(?Document $document): self
    {
        $this->document = $document;

        return $this;
    }
}
