<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefUsersGroups
 *
 * @ORM\Table(name="cms_stzef_users_groups", indexes={@ORM\Index(name="fk_CMSstzef_users_groups_CMSstzef_states1_idx", columns={"id_state"})})
 * @ORM\Entity
 */
class CmsStzefUsersGroups
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * @return CmsStzefUsersGroups
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idState
     *
     * @param \AppBundle\Entity\CmsStzefStates $idState
     * @return CmsStzefUsersGroups
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
