<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsstzefTypesModules
 *
 * @ORM\Table(name="CMSstzef_types_modules")
 * @ORM\Entity
 */
class CmsstzefTypesModules
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
     * @ORM\Column(name="id_type_modules", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypeModules;



    /**
     * Set name
     *
     * @param string $name
     * @return CmsstzefTypesModules
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
     * Get idTypeModules
     *
     * @return integer 
     */
    public function getIdTypeModules()
    {
        return $this->idTypeModules;
    }
}
