<?php
namespace Apitest\Entities;

use Apitude\Core\Entities\AbstractEntity;
use Apitude\Core\EntityStubs\StampEntityInterface;
use Apitude\Core\EntityStubs\StampEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Apitude\Core\Annotations\API;

/**
 * Class Person
 * @package Apitest\Entities
 * @ORM\Entity
 * @ORM\Table(name="persons")
 * @API\Entity\Expose
 */
class Person extends AbstractEntity implements StampEntityInterface
{
    use StampEntityTrait;

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @API\Property\Expose
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=64)
     * @API\Property\Expose()
     */
    private $firstName;

    /**
     * @var string
     * @ORM\Column(type="string", length=64)
     * @API\Property\Expose()
     */
    private $lastName;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Person
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Person
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }
}
