<?php

namespace App\Entity;

use App\Repository\TypeTiersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeTiersRepository::class)]
class TypeTiers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Libelle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Description = null;

    #[ORM\OneToMany(mappedBy: 'typeTiers', targetEntity: Tiers::class)]
    private Collection $tiers;

    public function __construct()
    {
        $this->tiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(string $Libelle): self
    {
        $this->Libelle = $Libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection<int, Tiers>
     */
    public function getTiers(): Collection
    {
        return $this->tiers;
    }

    public function addTier(Tiers $tier): self
    {
        if (!$this->tiers->contains($tier)) {
            $this->tiers->add($tier);
            $tier->setTypeTiers($this);
        }

        return $this;
    }

    public function removeTier(Tiers $tier): self
    {
        if ($this->tiers->removeElement($tier)) {
            // set the owning side to null (unless already changed)
            if ($tier->getTypeTiers() === $this) {
                $tier->setTypeTiers(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
       return $this->getLibelle();
    }
}
