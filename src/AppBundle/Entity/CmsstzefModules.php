<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsstzefModules
 *
 * @ORM\Table(name="CMSstzef_modules", indexes={@ORM\Index(name="fk_CMSstzef_modules_CMSstzef_sections1_idx", columns={"id_section_theme"}), @ORM\Index(name="fk_CMSstzef_modules_CMSstzef_types_modules1_idx", columns={"id_type_module"}), @ORM\Index(name="fk_CMSstzef_modules_CMSstzef_states1_idx", columns={"id_state_publication"})})
 * @ORM\Entity
 */
class CmsstzefModules
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
     * @ORM\Column(name="id_module", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModule;

    /**
     * @var \AppBundle\Entity\CmsstzefStatesPublication
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsstzefStatesPublication")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_state_publication", referencedColumnName="id_state")
     * })
     */
    private $idStatePublication;

    /**
     * @var \AppBundle\Entity\CmsstzefTypesModules
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsstzefTypesModules")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_module", referencedColumnName="id_type_modules")
     * })
     */
    private $idTypeModule;

    /**
     * @var \AppBundle\Entity\CmsstzefSections
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsstzefSections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_section_theme", referencedColumnName="id_section_theme")
     * })
     */
    private $idSectionTheme;



    /**
     * Set name
     *
     * @param string $name
     * @return CmsstzefModules
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
     * Get idModule
     *
     * @return integer 
     */
    public function getIdModule()
    {
        return $this->idModule;
    }

    /**
     * Set idStatePublication
     *
     * @param \AppBundle\Entity\CmsstzefStatesPublication $idStatePublication
     * @return CmsstzefModules
     */
    public function setIdStatePublication(\AppBundle\Entity\CmsstzefStatesPublication $idStatePublication = null)
    {
        $this->idStatePublication = $idStatePublication;

        return $this;
    }

    /**
     * Get idStatePublication
     *
     * @return \AppBundle\Entity\CmsstzefStatesPublication 
     */
    public function getIdStatePublication()
    {
        return $this->idStatePublication;
    }

    /**
     * Set idTypeModule
     *
     * @param \AppBundle\Entity\CmsstzefTypesModules $idTypeModule
     * @return CmsstzefModules
     */
    public function setIdTypeModule(\AppBundle\Entity\CmsstzefTypesModules $idTypeModule = null)
    {
        $this->idTypeModule = $idTypeModule;

        return $this;
    }

    /**
     * Get idTypeModule
     *
     * @return \AppBundle\Entity\CmsstzefTypesModules 
     */
    public function getIdTypeModule()
    {
        return $this->idTypeModule;
    }

    /**
     * Set idSectionTheme
     *
     * @param \AppBundle\Entity\CmsstzefSections $idSectionTheme
     * @return CmsstzefModules
     */
    public function setIdSectionTheme(\AppBundle\Entity\CmsstzefSections $idSectionTheme = null)
    {
        $this->idSectionTheme = $idSectionTheme;

        return $this;
    }

    /**
     * Get idSectionTheme
     *
     * @return \AppBundle\Entity\CmsstzefSections 
     */
    public function getIdSectionTheme()
    {
        return $this->idSectionTheme;
    }
}
