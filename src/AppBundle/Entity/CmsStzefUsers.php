<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
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
class CmsStzefUsers extends BaseUser
{
    /** 
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    protected $name;


    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=false)
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=false)
     */
    protected $password;

    /**
     * @var string
     *
     * @ORM\Column(name="plain_password", type="string", length=45, nullable=false)
     */
    protected $plainPassword;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    protected $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="resgiter_date", type="datetime", nullable=false)
     */
    protected $resgiterDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var \AppBundle\Entity\CmsStzefUsersGroups
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefUsersGroups")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_users_group", referencedColumnName="id")
     * })
     */
    protected $idUsersGroup;

    /**
     * @var \AppBundle\Entity\CmsStzefStates
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefStates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_state", referencedColumnName="id")
     * })
     */
    protected $idState;



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
     * Set plainPassword
     *
     * @param string $plainPassword
     * @return CmsStzefUsers
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * Get plainPassword
     *
     * @return string 
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return CmsStzefUsers
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set resgiterDate
     *
     * @param \DateTime $resgiterDate
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
     * @return \DateTime 
     */
    public function getResgiterDate()
    {
        return $this->resgiterDate;
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
        parent::__construct();
        // your own logic

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
