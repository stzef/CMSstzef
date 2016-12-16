<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefDisplayTypes
 *
 * @ORM\Table(name="cms_stzef_display_types")
 * @ORM\Entity
 */
class CmsStzefDisplayTypes
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
     * @ORM\Column(name="css_class", type="string", length=45, nullable=false)
     */
    private $cssClass;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



public function __toString()
{
    return $this->name;
}

    /**
     * Set name
     *
     * @param string $name
     * @return CmsStzefDisplayTypes
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
     * Set cssClass
     *
     * @param string $cssClass
     * @return CmsStzefDisplayTypes
     */
    public function setCssClass($cssClass)
    {
        $this->cssClass = $cssClass;

        return $this;
    }

    /**
     * Get cssClass
     *
     * @return string 
     */
    public function getCssClass()
    {
        return $this->cssClass;
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
}
