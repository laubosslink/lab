<?php

namespace Test\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test\TestBundle\Entity\User
 */
class User
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $username
     */
    private $username;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $addresses;

    public function __construct()
    {
        $this->addresses = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add addresses
     *
     * @param Test\TestBundle\Entity\Address $addresses
     * @return User
     */
    public function addAddresse(\Test\TestBundle\Entity\Address $addresses)
    {
        $this->addresses[] = $addresses;
        return $this;
    }

    /**
     * Remove addresses
     *
     * @param <variableType$addresses
     */
    public function removeAddresse(\Test\TestBundle\Entity\Address $addresses)
    {
        $this->addresses->removeElement($addresses);
    }

    /**
     * Get addresses
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAddresses()
    {
        return $this->addresses;
    }
}