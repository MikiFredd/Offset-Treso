<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * Trait UuidTrait
 */
trait UuidTrait
{
    /**
     * @var UuidInterface
     *
     */
    #[ORM\Column(type: 'uuid', unique: 'true')]
    private $uuid = null;



    /**
     * @return UuidInterface
     */

    // mettre dans le constructeur de l'entité concerné:
    //publicfunction __construct()
    //{
    // $this->uuid   = Uuid::uuid4();
    //}
    
	/**
	 * 
	 * @return UuidInterface
	 */
	function getUuid() {
		return $this->uuid;
	}
	
	/**
	 * 
	 * @param UuidInterface $uuid 
	 * @return UuidTrait
	 */
	function setUuid($uuid): self {
		$this->uuid = $uuid;
		return $this;
	}
}
