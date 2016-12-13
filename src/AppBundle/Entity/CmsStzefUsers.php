<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefUsers
 *
 * @ORM\Table(name="cms_stzef_users", indexes={@ORM\Index(name="fk_CMSstzef_users_CMSstzef_users_groups1_idx", columns={"id_users_group"}), @ORM\Index(name="fk_CMSstzef_users_CMSstzef_states1_idx", columns={"id_state"})})
 * @ORM\Entity
 */
class CmsStzefUsers
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
     * @ORM\Column(name="usename", type="string", length=45, nullable=false)
     */
    private $usename;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="active", type="string", length=45, nullable=false)
     */
    private $active;

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
     * Set usename
     *
     * @param string $usename
     * @return CmsStzefUsers
     */
    public function setUsename($usename)
    {
        $this->usename = $usename;

        return $this;
    }

    /**
     * Get usename
     *
     * @return string 
     */
    public function getUsename()
    {
        return $this->usename;
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
     * Set active
     *
     * @param string $active
     * @return CmsStzefUsers
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return string 
     */
    public function getActive()
    {
        return $this->active;
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
}
