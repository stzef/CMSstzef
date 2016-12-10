<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefModules
 *
 * @ORM\Table(name="cms_stzef_modules", indexes={@ORM\Index(name="fk_CMSstzef_modules_CMSstzef_sections1_idx", columns={"id_section_theme"}), @ORM\Index(name="fk_CMSstzef_modules_CMSstzef_types_modules1_idx", columns={"id_type_module"}), @ORM\Index(name="fk_CMSstzef_modules_CMSstzef_states1_idx", columns={"id_state_publication"})})
 * @ORM\Entity
 */
class CmsStzefModules
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
     * @var \AppBundle\Entity\CmsStzefStatesPublication
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefStatesPublication")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_state_publication", referencedColumnName="id")
     * })
     */
    private $idStatePublication;

    /**
     * @var \AppBundle\Entity\CmsStzefTypesModules
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefTypesModules")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_module", referencedColumnName="id")
     * })
     */
    private $idTypeModule;

    /**
     * @var \AppBundle\Entity\CmsStzefSections
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefSections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_section_theme", referencedColumnName="id")
     * })
     */
    private $idSectionTheme;



public function __toString()
{
    return $this->name;
}

    /**
     * Set name
     *
     * @param string $name
     * @return CmsStzefModules
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
     * Set idStatePublication
     *
     * @param \AppBundle\Entity\CmsStzefStatesPublication $idStatePublication
     * @return CmsStzefModules
     */
    public function setIdStatePublication(\AppBundle\Entity\CmsStzefStatesPublication $idStatePublication = null)
    {
        $this->idStatePublication = $idStatePublication;

        return $this;
    }

    /**
     * Get idStatePublication
     *
     * @return \AppBundle\Entity\CmsStzefStatesPublication 
     */
    public function getIdStatePublication()
    {
        return $this->idStatePublication;
    }

    /**
     * Set idTypeModule
     *
     * @param \AppBundle\Entity\CmsStzefTypesModules $idTypeModule
     * @return CmsStzefModules
     */
    public function setIdTypeModule(\AppBundle\Entity\CmsStzefTypesModules $idTypeModule = null)
    {
        $this->idTypeModule = $idTypeModule;

        return $this;
    }

    /**
     * Get idTypeModule
     *
     * @return \AppBundle\Entity\CmsStzefTypesModules 
     */
    public function getIdTypeModule()
    {
        return $this->idTypeModule;
    }

    /**
     * Set idSectionTheme
     *
     * @param \AppBundle\Entity\CmsStzefSections $idSectionTheme
     * @return CmsStzefModules
     */
    public function setIdSectionTheme(\AppBundle\Entity\CmsStzefSections $idSectionTheme = null)
    {
        $this->idSectionTheme = $idSectionTheme;

        return $this;
    }

    /**
     * Get idSectionTheme
     *
     * @return \AppBundle\Entity\CmsStzefSections 
     */
    public function getIdSectionTheme()
    {
        return $this->idSectionTheme;
    }
}
