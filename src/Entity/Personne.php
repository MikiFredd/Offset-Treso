<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\TimestampableTrait;

#[ORM\Entity(repositoryClass: PersonneRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Personne
{

    use TimestampableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fonction = null;

    #[ORM\OneToMany(mappedBy: 'nomChef', targetEntity: MissionOrder::class)]
    private Collection $missionOrders;

    public function __construct()
    {
        $this->missionOrders = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(?string $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * @return Collection<int, MissionOrder>
     */
    public function getMissionOrders(): Collection
    {
        return $this->missionOrders;
    }

    public function addMissionOrder(MissionOrder $missionOrder): self
    {
        if (!$this->missionOrders->contains($missionOrder)) {
            $this->missionOrders->add($missionOrder);
            $missionOrder->setNomChef($this);
        }

        return $this;
    }

    public function removeMissionOrder(MissionOrder $missionOrder): self
    {
        if ($this->missionOrders->removeElement($missionOrder)) {
            // set the owning side to null (unless already changed)
            if ($missionOrder->getNomChef() === $this) {
                $missionOrder->setNomChef(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return ''.$this->getPrenom().' '.$this->getNom();
    }
}
