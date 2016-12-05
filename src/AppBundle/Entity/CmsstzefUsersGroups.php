<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsstzefUsersGroups
 *
 * @ORM\Table(name="CMSstzef_users_groups", indexes={@ORM\Index(name="fk_CMSstzef_users_groups_CMSstzef_states1_idx", columns={"id_state"})})
 * @ORM\Entity
 */
class CmsstzefUsersGroups
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_users_group", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsersGroup;

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
     * Set name
     *
     * @param string $name
     * @return CmsstzefUsersGroups
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
     * Get idUsersGroup
     *
     * @return integer 
     */
    public function getIdUsersGroup()
    {
        return $this->idUsersGroup;
    }

    /**
     * Set idState
     *
     * @param \AppBundle\Entity\CmsstzefStates $idState
     * @return CmsstzefUsersGroups
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
}
