<?php

namespace AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefUsers
 *
 * @ORM\Table(name="cms_stzef_users", indexes={@ORM\Index(name="fk_CMSstzef_users_CMSstzef_users_groups1_idx", columns={"id_users_group"}), @ORM\Index(name="fk_CMSstzef_users_CMSstzef_states1_idx", columns={"id_state"})})
 * @ORM\Entity
 */
class CmsStzefUsers extends BaseUser
{
     public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->isActive = true;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=false)
     */
    protected $username;

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
     * @var string
     *
     * @ORM\Column(name="username_canonical", type="string", length=45, nullable=true)
     */
    protected $usernameCanonical;

    /**
     * @var string
     *
     * @ORM\Column(name="email_canonical", type="string", length=45, nullable=true)
     */
    protected $emailCanonical;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=true)
     */
    protected $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=45, nullable=true)
     */
    protected $salt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    protected $lastLogin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="expired", type="boolean", nullable=true)
     */
    protected $expired;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expires_at", type="datetime", nullable=true)
     */
    protected $expiresAt;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmation_token", type="string", length=45, nullable=true)
     */
    protected $confirmationToken;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="password_requested_at", type="datetime", nullable=true)
     */
    protected $passwordRequestedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="credentials_expired", type="boolean", nullable=true)
     */
    protected $credentialsExpired;

    /**
     * @var boolean
     *
     * @ORM\Column(name="locked", type="boolean", nullable=true)
     */
    protected $locked;

    /**
     * @var string
     *
     * @ORM\Column(name="roles", type="string", length=45, nullable=true)
     */
    protected $roles;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="credentials_expire_at", type="datetime", nullable=true)
     */
    protected $credentialsExpireAt;

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
}
