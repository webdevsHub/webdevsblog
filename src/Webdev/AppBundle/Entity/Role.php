<?php

namespace Webdev\AppBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;

use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Webdev\AppBundle\Entity\Role
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Webdev\AppBundle\Entity\RoleRepository")
 */
class Role implements RoleInterface
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="userRoles")
     */
    private $users;
    
    public function __construct()
    {
    	$this->users = new ArrayCollection();
    }
    
    /*
     * methods for RoleInterface
     */
    public function getRole()
    {
    	return $this->getName();
    }

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
     * Set name
     *
     * @param string $name
     * @return Role
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
     * Add users
     *
     * @param Webdev\AppBundle\Entity\User $users
     */
    public function addUser(\Webdev\AppBundle\Entity\User $users)
    {
        $this->users[] = $users;
    }

    /**
     * Get users
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}