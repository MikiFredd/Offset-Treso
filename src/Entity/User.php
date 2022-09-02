<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\TimestampableTrait;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\HasLifecycleCallbacks] 
class User implements UserInterface, PasswordAuthenticatedUserInterface
{

    use TimestampableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $username = null;

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(nullable: true)]
    private ?int $type_id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fonction = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_enabled = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_deleted = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_standard = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_manager = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_admin = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_super_admin = null;

    #[ORM\ManyToMany(targetEntity: Permission::class, inversedBy: 'users')]
    private Collection $permission;

    public function __construct()
    {
        $this->permission = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represent this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->permission->map(function (Permission $permission) {
            return $permission->getCode();
        })->toArray();
        // guarantee every user at least has ROLE_USER

        return array_unique($roles);
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getTypeId(): ?int
    {
        return $this->type_id;
    }

    public function setTypeId(?int $type_id): self
    {
        $this->type_id = $type_id;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function isIsEnabled(): ?bool
    {
        return $this->is_enabled;
    }

    public function setIsEnabled(?bool $is_enabled): self
    {
        $this->is_enabled = $is_enabled;

        return $this;
    }

    public function isIsDeleted(): ?bool
    {
        return $this->is_deleted;
    }

    public function setIsDeleted(?bool $is_deleted): self
    {
        $this->is_deleted = $is_deleted;

        return $this;
    }

    public function isIsStandard(): ?bool
    {
        return $this->is_standard;
    }

    public function setIsStandard(?bool $is_standard): self
    {
        $this->is_standard = $is_standard;

        return $this;
    }

    public function isIsManager(): ?bool
    {
        return $this->is_manager;
    }

    public function setIsManager(?bool $is_manager): self
    {
        $this->is_manager = $is_manager;

        return $this;
    }

    public function isIsAdmin(): ?bool
    {
        return $this->is_admin;
    }

    public function setIsAdmin(?bool $is_admin): self
    {
        $this->is_admin = $is_admin;

        return $this;
    }

    public function isIsSuperAdmin(): ?bool
    {
        return $this->is_super_admin;
    }

    public function setIsSuperAdmin(?bool $is_super_admin): self
    {
        $this->is_super_admin = $is_super_admin;

        return $this;
    }

    /**
     * @return Collection<int, Permission>
     */
    public function getPermission(): Collection
    {
        return $this->permission;
    }

    public function addPermission(Permission $permission): self
    {
        if (!$this->permission->contains($permission)) {
            $this->permission->add($permission);
        }

        return $this;
    }

    public function removePermission(Permission $permission): self
    {
        $this->permission->removeElement($permission);

        return $this;
    }
}
