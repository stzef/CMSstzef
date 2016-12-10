<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefSections
 *
 * @ORM\Table(name="cms_stzef_sections")
 * @ORM\Entity
 */
class CmsStzefSections
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
     * @ORM\Column(name="selector_css", type="string", length=45, nullable=false)
     */
    private $selectorCss;

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
     * @return CmsStzefSections
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
     * Set selectorCss
     *
     * @param string $selectorCss
     * @return CmsStzefSections
     */
    public function setSelectorCss($selectorCss)
    {
        $this->selectorCss = $selectorCss;

        return $this;
    }

    /**
     * Get selectorCss
     *
     * @return string 
     */
    public function getSelectorCss()
    {
        return $this->selectorCss;
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
