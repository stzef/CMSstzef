<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * CmsStzefUsers
 *
 * @ORM\Table(name="cms_stzef_users", indexes={@ORM\Index(name="fk_CMSstzef_users_CMSstzef_users_groups1_idx", columns={"id_users_group"}), @ORM\Index(name="fk_CMSstzef_users_CMSstzef_states1_idx", columns={"id_state"})})
 * @ORM\Entity
 */
class CmsStzefUsers implements UserInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="plainPassword", type="string", length=45, nullable=true)
     */
    private $plainpassword;

    /**
     * @var string
     *
     * @ORM\Column(name="isActive", type="string", length=45, nullable=false)
     */
    private $isactive;

    /**
     * @var string
     *
     * @ORM\Column(name="resgiter_date", type="string", length=45, nullable=false)
     */
    private $resgiterDate;

    /**
     * @var string
     *
     * @ORM\Column(name="activation", type="string", length=45, nullable=false)
     */
    private $activation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\CmsStzefUsersGroups
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefUsersGroups")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_users_group", referencedColumnName="id")
     * })
     */
    private $idUsersGroup;

    /**
     * @var \AppBundle\Entity\CmsStzefStates
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefStates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_state", referencedColumnName="id")
     * })
     */
    private $idState;



public function __toString()
{
    return $this->name;
}

    /**
     * Set name
     *
     * @param string $name
     * @return CmsStzefUsers
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
     * Set username
     *
     * @param string $username
     * @return CmsStzefUsers
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
     * Set email
     *
     * @param string $email
     * @return CmsStzefUsers
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return CmsStzefUsers
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
     * Set plainpassword
     *
     * @param string $plainpassword
     * @return CmsStzefUsers
     */
    public function setPlainpassword($plainpassword)
    {
        $this->plainpassword = $plainpassword;

        return $this;
    }

    /**
     * Get plainpassword
     *
     * @return string 
     */
    public function getPlainpassword()
    {
        return $this->plainpassword;
    }

    /**
     * Set isactive
     *
     * @param string $isactive
     * @return CmsStzefUsers
     */
    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;

        return $this;
    }

    /**
     * Get isactive
     *
     * @return string 
     */
    public function getIsactive()
    {
        return $this->isactive;
    }

    /**
     * Set resgiterDate
     *
     * @param string $resgiterDate
     * @return CmsStzefUsers
     */
    public function setResgiterDate($resgiterDate)
    {
        $this->resgiterDate = $resgiterDate;

        return $this;
    }

    /**
     * Get resgiterDate
     *
     * @return string 
     */
    public function getResgiterDate()
    {
        return $this->resgiterDate;
    }

    /**
     * Set activation
     *
     * @param string $activation
     * @return CmsStzefUsers
     */
    public function setActivation($activation)
    {
        $this->activation = $activation;

        return $this;
    }

    /**
     * Get activation
     *
     * @return string 
     */
    public function getActivation()
    {
        return $this->activation;
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
     * Set idUsersGroup
     *
     * @param \AppBundle\Entity\CmsStzefUsersGroups $idUsersGroup
     * @return CmsStzefUsers
     */
    public function setIdUsersGroup(\AppBundle\Entity\CmsStzefUsersGroups $idUsersGroup = null)
    {
        $this->idUsersGroup = $idUsersGroup;

        return $this;
    }

    /**
     * Get idUsersGroup
     *
     * @return \AppBundle\Entity\CmsStzefUsersGroups 
     */
    public function getIdUsersGroup()
    {
        return $this->idUsersGroup;
    }

    /**
     * Set idState
     *
     * @param \AppBundle\Entity\CmsStzefStates $idState
     * @return CmsStzefUsers
     */
    public function setIdState(\AppBundle\Entity\CmsStzefStates $idState = null)
    {
        $this->idState = $idState;

        return $this;
    }

    /**
     * Get idState
     *
     * @return \AppBundle\Entity\CmsStzefStates 
     */
    public function getIdState()
    {
        return $this->idState;
    }


    public function __construct()
    {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid(null, true));
    }
    public function getSalt()
    {
        // The bcrypt algorithm doesn't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
}
