<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * CmsStzefUsers
 *
 * @ORM\Table(name="cms_stzef_users")
 * @ORM\Entity
 */
class CmsStzefUsers extends BaseUser
{
    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->activation = false;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    protected $name;


    /**
     * @var boolean
     *
     * @ORM\Column(name="activation", type="boolean", nullable=false)
     */
    protected $activation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="resgiter_date", type="datetime", nullable=false)
     */
    protected $resgiterDate;

    /**
     * @var string
     *
     * @ORM\Column(name="username_canonical", type="string", length=255, nullable=true)
     */

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;



public function __toString()
{
    return $this->username;
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
     * Set activation
     *
     * @param boolean $activation
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
     * @return boolean
     */
    public function getActivation()
    {
        return $this->activation;
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
     * @var string
     */
    private $photo;


    /**
     * Set photo
     *
     * @param string $photo
     * @return CmsStzefUsers
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return CmsStzefUsers
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get expired
     *
     * @return boolean
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * Get expiresAt
     *
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * Get credentialsExpired
     *
     * @return boolean
     */
    public function getCredentialsExpired()
    {
        return $this->credentialsExpired;
    }

    /**
     * Get credentialsExpireAt
     *
     * @return \DateTime
     */
    public function getCredentialsExpireAt()
    {
        return $this->credentialsExpireAt;
    }

    /**
     * Get locked
     *
     * @return boolean
     */
    public function getLocked()
    {
        return $this->locked;
    }
}
