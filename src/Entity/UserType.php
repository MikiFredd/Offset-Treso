<?php

namespace App\Entity;

use App\Repository\UserTypeRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\TimestampableTrait;

#[ORM\Entity(repositoryClass: UserTypeRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UserType
{
    use TimestampableTrait;
    // Ajoutez cette ligne (n'oubliez pas le use au dessus)


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
