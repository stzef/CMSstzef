<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsstzefUsers
 *
 * @ORM\Table(name="CMSstzef_users", indexes={@ORM\Index(name="fk_CMSstzef_users_CMSstzef_users_groups1_idx", columns={"id_users_group"}), @ORM\Index(name="fk_CMSstzef_users_CMSstzef_states1_idx", columns={"id_state"})})
 * @ORM\Entity
 */
class CmsstzefUsers
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="usename", type="string", length=45, nullable=true)
     */
    private $usename;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="active", type="string", length=45, nullable=true)
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(name="resgiter_date", type="string", length=45, nullable=true)
     */
    private $resgiterDate;

    /**
     * @var string
     *
     * @ORM\Column(name="activation", type="string", length=45, nullable=true)
     */
    private $activation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var \AppBundle\Entity\CmsstzefStates
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsstzefStates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_state", referencedColumnName="id_state")
     * })
     */
    private $idState;

    /**
     * @var \AppBundle\Entity\CmsstzefUsersGroups
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsstzefUsersGroups")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_users_group", referencedColumnName="id_users_group")
     * })
     */
    private $idUsersGroup;



    /**
     * Set name
     *
     * @param string $name
     * @return CmsstzefUsers
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
     * @return CmsstzefUsers
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
     * @return CmsstzefUsers
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
     * @return CmsstzefUsers
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
     * @return CmsstzefUsers
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
     * @return CmsstzefUsers
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
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idState
     *
     * @param \AppBundle\Entity\CmsstzefStates $idState
     * @return CmsstzefUsers
     */
    public function setIdState(\AppBundle\Entity\CmsstzefStates $idState = null)
    {
        $this->idState = $idState;

        return $this;
    }

    /**
     * Get idState
     *
     * @return \AppBundle\Entity\CmsstzefStates 
     */
    public function getIdState()
    {
        return $this->idState;
    }

    /**
     * Set idUsersGroup
     *
     * @param \AppBundle\Entity\CmsstzefUsersGroups $idUsersGroup
     * @return CmsstzefUsers
     */
    public function setIdUsersGroup(\AppBundle\Entity\CmsstzefUsersGroups $idUsersGroup = null)
    {
        $this->idUsersGroup = $idUsersGroup;

        return $this;
    }

    /**
     * Get idUsersGroup
     *
     * @return \AppBundle\Entity\CmsstzefUsersGroups 
     */
    public function getIdUsersGroup()
    {
        return $this->idUsersGroup;
    }
}
