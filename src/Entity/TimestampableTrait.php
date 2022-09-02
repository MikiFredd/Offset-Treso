<?php

namespace App\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait TimestampableTrait
 */
trait TimestampableTrait
{
    /**
     * @Gedmo\Timestampable(on="create")
     */
    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    /**
     * @Gedmo\Timestampable(on="update")
     */
    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;
    /**
     * @return \DateTime
     */
    
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
