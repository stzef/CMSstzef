<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsstzefTypesAccess
 *
 * @ORM\Table(name="CMSstzef_types_access")
 * @ORM\Entity
 */
class CmsstzefTypesAccess
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
     * @ORM\Column(name="id_type_access", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypeAccess;



    /**
     * Set name
     *
     * @param string $name
     * @return CmsstzefTypesAccess
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
     * Get idTypeAccess
     *
     * @return integer 
     */
    public function getIdTypeAccess()
    {
        return $this->idTypeAccess;
    }
}
