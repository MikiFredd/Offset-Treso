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

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $num_mission_order = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_chef = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_chef = null;

    #[ORM\Column(length: 255)]
    private ?string $fonction_chef = null;

    #[ORM\Column(length: 255)]
    private ?string $lieu = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_depart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_retour = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $motif = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $num_vehicule = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_chauffeur = null;

    #[ORM\ManyToMany(targetEntity: PersonnesABord::class, inversedBy: 'missionOrders')]
    private Collection $personnes_a_bord;

    public function __construct()
    {
        $this->personnes_a_bord = new ArrayCollection();
    }

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

    public function getNumMissionOrder(): ?string
    {
        return $this->num_mission_order;
    }

    public function setNumMissionOrder(string $num_mission_order): self
    {
        $this->num_mission_order = $num_mission_order;

        return $this;
    }

    public function getNomChef(): ?string
    {
        return $this->nom_chef;
    }

    public function setNomChef(string $nom_chef): self
    {
        $this->nom_chef = $nom_chef;

        return $this;
    }

    public function getPrenomChef(): ?string
    {
        return $this->prenom_chef;
    }

    public function setPrenomChef(string $prenom_chef): self
    {
        $this->prenom_chef = $prenom_chef;

        return $this;
    }

    public function getFonctionChef(): ?string
    {
        return $this->fonction_chef;
    }

    public function setFonctionChef(string $fonction_chef): self
    {
        $this->fonction_chef = $fonction_chef;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->date_depart;
    }

    public function setDateDepart(\DateTimeInterface $date_depart): self
    {
        $this->date_depart = $date_depart;

        return $this;
    }

    public function getDateRetour(): ?\DateTimeInterface
    {
        return $this->date_retour;
    }

    public function setDateRetour(\DateTimeInterface $date_retour): self
    {
        $this->date_retour = $date_retour;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    public function getNumVehicule(): ?string
    {
        return $this->num_vehicule;
    }

    public function setNumVehicule(?string $num_vehicule): self
    {
        $this->num_vehicule = $num_vehicule;

        return $this;
    }

    public function getNomChauffeur(): ?string
    {
        return $this->nom_chauffeur;
    }

    public function setNomChauffeur(string $nom_chauffeur): self
    {
        $this->nom_chauffeur = $nom_chauffeur;

        return $this;
    }

    /**
     * @return Collection<int, PersonnesABord>
     */
    public function getPersonnesABord(): Collection
    {
        return $this->personnes_a_bord;
    }

    public function addPersonnesABord(PersonnesABord $personnesABord): self
    {
        if (!$this->personnes_a_bord->contains($personnesABord)) {
            $this->personnes_a_bord->add($personnesABord);
        }

        return $this;
    }

    public function removePersonnesABord(PersonnesABord $personnesABord): self
    {
        $this->personnes_a_bord->removeElement($personnesABord);

        return $this;
    }
}
