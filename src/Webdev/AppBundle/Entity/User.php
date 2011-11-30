<?php

namespace Webdev\AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Webdev\AppBundle\Entity\User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Webdev\AppBundle\Entity\UserRepository")
 */
class User implements UserInterface
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
     * @var string $username
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string $salt
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @ORM\ManyToMany(targetEntity="Role", inversedBy="users")
     * @ORM\JoinTable(name="user_roles")
     */
    private $userRoles;
    
    public function __construct()
    {
    	$this->userRoles = new ArrayCollection();
    	$this->salt = md5(uniqid());
    }
    
    /*
     * methods for UserInterface
     */
    public function getRoles()
    {
    	return $this->getUserRoles()->toArray();
    }
    
    public function eraseCredentials()
    {
    	
    }
    
    public function equals(UserInterface $user)
    {
    	return $this->getUsername() == $user->getUsername();
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
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Add userRoles
     *
     * @param Webdev\AppBundle\Entity\Role $userRoles
     */
    public function addRole(\Webdev\AppBundle\Entity\Role $userRoles)
    {
        $this->userRoles[] = $userRoles;
    }

    /**
     * Get userRoles
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }
}