<?php

namespace App\Entity;

use App\Repository\PersonnesABordRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\TimestampableTrait;

#[ORM\Entity(repositoryClass: PersonnesABordRepository::class)]
#[ORM\HasLifecycleCallbacks]
class PersonnesABord
{

    use TimestampableTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $Fonction = null;

    #[ORM\ManyToMany(targetEntity: MissionOrder::class, mappedBy: 'personnes_a_bord')]
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
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->Fonction;
    }

    public function setFonction(string $Fonction): self
    {
        $this->Fonction = $Fonction;

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
            $missionOrder->addPersonnesABord($this);
        }

        return $this;
    }

    public function removeMissionOrder(MissionOrder $missionOrder): self
    {
        if ($this->missionOrders->removeElement($missionOrder)) {
            $missionOrder->removePersonnesABord($this);
        }

        return $this;
    }
}
