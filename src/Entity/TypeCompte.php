<?php

namespace App\Entity;

use App\Repository\TypeCompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\TimestampableTrait;

#[ORM\Entity(repositoryClass: TypeCompteRepository::class)]
#[ORM\HasLifecycleCallbacks]
class TypeCompte
{

    use TimestampableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Intitule = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Description = null;

    #[ORM\OneToMany(mappedBy: 'typeCompte', targetEntity: TreasuryAccount::class)]
    private Collection $treasuryAccounts;

    public function __construct()
    {
        $this->treasuryAccounts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->Intitule;
    }

    public function setIntitule(string $Intitule): self
    {
        $this->Intitule = $Intitule;

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

    public function __toString()
    {
       return $this->getIntitule();
    }

    /**
     * @return Collection<int, TreasuryAccount>
     */
    public function getTreasuryAccounts(): Collection
    {
        return $this->treasuryAccounts;
    }

    public function addTreasuryAccount(TreasuryAccount $treasuryAccount): self
    {
        if (!$this->treasuryAccounts->contains($treasuryAccount)) {
            $this->treasuryAccounts->add($treasuryAccount);
            $treasuryAccount->setTypeCompte($this);
        }

        return $this;
    }

    public function removeTreasuryAccount(TreasuryAccount $treasuryAccount): self
    {
        if ($this->treasuryAccounts->removeElement($treasuryAccount)) {
            // set the owning side to null (unless already changed)
            if ($treasuryAccount->getTypeCompte() === $this) {
                $treasuryAccount->setTypeCompte(null);
            }
        }

        return $this;
    }
}
