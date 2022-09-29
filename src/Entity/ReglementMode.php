<?php

namespace App\Entity;

use App\Repository\ReglementModeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\TimestampableTrait;

#[ORM\Entity(repositoryClass: ReglementModeRepository::class)]
#[ORM\HasLifecycleCallbacks]
class ReglementMode
{

    use TimestampableTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'modeReglement', targetEntity: DetailDocument::class)]
    private Collection $detailDocuments;
    public function __construct()
    {
        $this->detailDocuments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
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

    public function __toString():string
    {
        return $this->getNom();
    }

    /**
     * @return Collection<int, DetailDocument>
     */
    public function getDetailDocuments(): Collection
    {
        return $this->detailDocuments;
    }

    public function addDetailDocument(DetailDocument $detailDocument): self
    {
        if (!$this->detailDocuments->contains($detailDocument)) {
            $this->detailDocuments->add($detailDocument);
            $detailDocument->setModeReglement($this);
        }

        return $this;
    }

    public function removeDetailDocument(DetailDocument $detailDocument): self
    {
        if ($this->detailDocuments->removeElement($detailDocument)) {
            // set the owning side to null (unless already changed)
            if ($detailDocument->getModeReglement() === $this) {
                $detailDocument->setModeReglement(null);
            }
        }

        return $this;
    }
}
