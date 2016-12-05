<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsstzefSections
 *
 * @ORM\Table(name="CMSstzef_sections")
 * @ORM\Entity
 */
class CmsstzefSections
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
     * @ORM\Column(name="id_section_theme", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSectionTheme;



    /**
     * Set name
     *
     * @param string $name
     * @return CmsstzefSections
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
     * Get idSectionTheme
     *
     * @return integer 
     */
    public function getIdSectionTheme()
    {
        return $this->idSectionTheme;
    }
}
