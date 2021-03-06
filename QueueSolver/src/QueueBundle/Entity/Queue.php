<?php

namespace QueueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Queue
 *
 * @ORM\Table(name="queue")
 * @ORM\Entity(repositoryClass="QueueBundle\Repository\QueueRepository")
 */
class Queue
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="enterprise", type="string", length=255)
     */
    private $enterprise;

    /**
     * @var string
     *
     * @ORM\Column(name="branchoffice", type="string", length=255, unique=true)
     */
    private $branchoffice;

    /**
     * @var int
     *
     * @ORM\Column(name="peoplequeued", type="bigint")
     */
    private $peoplequeued;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Queue
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set enterprise
     *
     * @param string $enterprise
     *
     * @return Queue
     */
    public function setEnterprise($enterprise)
    {
        $this->enterprise = $enterprise;

        return $this;
    }

    /**
     * Get enterprise
     *
     * @return string
     */
    public function getEnterprise()
    {
        return $this->enterprise;
    }

    /**
     * Set branchoffice
     *
     * @param string $branchoffice
     *
     * @return Queue
     */
    public function setBranchoffice($branchoffice)
    {
        $this->branchoffice = $branchoffice;

        return $this;
    }

    /**
     * Get branchoffice
     *
     * @return string
     */
    public function getBranchoffice()
    {
        return $this->branchoffice;
    }

    /**
     * Set peoplequeued
     *
     * @param integer $peoplequeued
     *
     * @return Queue
     */
    public function setPeoplequeued($peoplequeued)
    {
        $this->peoplequeued = $peoplequeued;

        return $this;
    }

    /**
     * Get peoplequeued
     *
     * @return int
     */
    public function getPeoplequeued()
    {
        return $this->peoplequeued;
    }
}
