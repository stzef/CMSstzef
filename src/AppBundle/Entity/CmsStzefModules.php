<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefModules
 *
 * @ORM\Table(name="cms_stzef_modules", indexes={@ORM\Index(name="fk_CMSstzef_modules_CMSstzef_sections1_idx", columns={"id_section_theme"}), @ORM\Index(name="fk_CMSstzef_modules_CMSstzef_types_modules1_idx", columns={"id_type_module"}), @ORM\Index(name="fk_CMSstzef_modules_CMSstzef_states1_idx", columns={"id_state_publication"}), @ORM\Index(name="fk_cms_stzef_modules_cms_stzef_types_access1_idx", columns={"id_type_access"}), @ORM\Index(name="fk_cms_stzef_modules_cms_stzef_users1_idx", columns={"creator_user"})})
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
     * @var string
     *
     * @ORM\Column(name="content_html", type="text", length=65535, nullable=true)
     */
    private $contentHtml;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime", nullable=false)
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=true)
     */
    private $modified;

    /**
     * @var string
     *
     * @ORM\Column(name="params", type="string", length=200, nullable=true)
     */
    private $params;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\CmsStzefUsers
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="creator_user", referencedColumnName="id")
     * })
     */
    private $creatorUser;

    /**
     * @var \AppBundle\Entity\CmsStzefTypesAccess
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefTypesAccess")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_access", referencedColumnName="id")
     * })
     */
    private $idTypeAccess;

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
     * @var \AppBundle\Entity\CmsStzefStatesPublication
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefStatesPublication")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_state_publication", referencedColumnName="id")
     * })
     */
    private $idStatePublication;

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
     * Set contentHtml
     *
     * @param string $contentHtml
     * @return CmsStzefModules
     */
    public function setContentHtml($contentHtml)
    {
        $this->contentHtml = $contentHtml;

        return $this;
    }

    /**
     * Get contentHtml
     *
     * @return string 
     */
    public function getContentHtml()
    {
        return $this->contentHtml;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return CmsStzefModules
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     * @return CmsStzefModules
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime 
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set params
     *
     * @param string $params
     * @return CmsStzefModules
     */
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * Get params
     *
     * @return string 
     */
    public function getParams()
    {
        return $this->params;
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
     * Set creatorUser
     *
     * @param \AppBundle\Entity\CmsStzefUsers $creatorUser
     * @return CmsStzefModules
     */
    public function setCreatorUser(\AppBundle\Entity\CmsStzefUsers $creatorUser = null)
    {
        $this->creatorUser = $creatorUser;

        return $this;
    }

    /**
     * Get creatorUser
     *
     * @return \AppBundle\Entity\CmsStzefUsers 
     */
    public function getCreatorUser()
    {
        return $this->creatorUser;
    }

    /**
     * Set idTypeAccess
     *
     * @param \AppBundle\Entity\CmsStzefTypesAccess $idTypeAccess
     * @return CmsStzefModules
     */
    public function setIdTypeAccess(\AppBundle\Entity\CmsStzefTypesAccess $idTypeAccess = null)
    {
        $this->idTypeAccess = $idTypeAccess;

        return $this;
    }

    /**
     * Get idTypeAccess
     *
     * @return \AppBundle\Entity\CmsStzefTypesAccess 
     */
    public function getIdTypeAccess()
    {
        return $this->idTypeAccess;
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
