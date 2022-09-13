<?php

namespace App\Entity;

use App\Repository\MissionOrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\TimestampableTrait;

#[ORM\Entity(repositoryClass: MissionOrderRepository::class)]
#[ORM\HasLifecycleCallbacks]
class MissionOrder
{

    use TimestampableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\ManyToOne(inversedBy: 'missionOrders')]
    private ?Personne $nomChef = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lieu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $motif = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numVehicule = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomChauffeur = null;

    #[ORM\ManyToMany(targetEntity: Personne::class, inversedBy: 'missionOrders')]
    private Collection $passager;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateDepart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateRetour = null;

    #[ORM\Column(length: 255)]
    private ?string $numMissionOrder = null;

    public function __construct()
    {
        $this->passager = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomChef(): ?Personne
    {
        return $this->nomChef;
    }

    public function setNomChef(?Personne $nomChef): self
    {
        $this->nomChef = $nomChef;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(?string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    public function getNumVehicule(): ?string
    {
        return $this->numVehicule;
    }

    public function setNumVehicule(?string $numVehicule): self
    {
        $this->numVehicule = $numVehicule;

        return $this;
    }

    public function getNomChauffeur(): ?string
    {
        return $this->nomChauffeur;
    }

    public function setNomChauffeur(?string $nomChauffeur): self
    {
        $this->nomChauffeur = $nomChauffeur;

        return $this;
    }

    /**
     * @return Collection<int, Personne>
     */
    public function getPassager(): Collection
    {
        return $this->passager;
    }

    public function addPassager(Personne $passager): self
    {
        if (!$this->passager->contains($passager)) {
            $this->passager->add($passager);
        }

        return $this;
    }

    public function removePassager(Personne $passager): self
    {
        $this->passager->removeElement($passager);

        return $this;
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

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->dateDepart;
    }

    public function setDateDepart(\DateTimeInterface $dateDepart): self
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    public function getDateRetour(): ?\DateTimeInterface
    {
        return $this->dateRetour;
    }

    public function setDateRetour(\DateTimeInterface $dateRetour): self
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    public function getNumMissionOrder(): ?string
    {
        return $this->numMissionOrder;
    }

    public function setNumMissionOrder(string $numMissionOrder): self
    {
        $this->numMissionOrder = $numMissionOrder;

        return $this;
    }
}
