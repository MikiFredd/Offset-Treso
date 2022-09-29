<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\TimestampableTrait;

#[ORM\Entity(repositoryClass: DocumentRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Document
{

    use TimestampableTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $numDocument = null;

    #[ORM\ManyToOne(inversedBy: 'documents')]
    private ?CashAccount $refCaisse = null;

    #[ORM\ManyToOne(inversedBy: 'documents')]
    private ?TypeOperation $typeOperation = null;

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

    public function getNumDocument(): ?string
    {
        return $this->numDocument;
    }

    public function setNumDocument(string $numDocument): self
    {
        $this->numDocument = $numDocument;

        return $this;
    }

    public function getRefCaisse(): ?CashAccount
    {
        return $this->refCaisse;
    }

    public function setRefCaisse(?CashAccount $refCaisse): self
    {
        $this->refCaisse = $refCaisse;

        return $this;
    }

    public function getTypeOperation(): ?TypeOperation
    {
        return $this->typeOperation;
    }

    public function setTypeOperation(?TypeOperation $typeOperation): self
    {
        $this->typeOperation = $typeOperation;

        return $this;
    }
}
