<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefGlobalConfiguration
 *
 * @ORM\Table(name="cms_stzef_global_configuration", indexes={@ORM\Index(name="fk_CMSstzef_global_configuration_CMSstzef_states1_idx", columns={"id_state_publication_default"}), @ORM\Index(name="fk_CMSstzef_global_configuration_CMSstzef_types_access1_idx", columns={"id_type_access_default"}), @ORM\Index(name="fk_CMSstzef_global_configuration_CMSstzef_categories1_idx", columns={"id_category_default"}), @ORM\Index(name="fk_CMSstzef_global_configuration_CMSstzef_themes1_idx", columns={"id_theme"})})
 * @ORM\Entity
 */
class CmsStzefGlobalConfiguration
{
    /**
     * @var string
     *
     * @ORM\Column(name="name_site", type="string", length=45, nullable=false)
     */
    private $nameSite;

    /**
     * @var boolean
     *
     * @ORM\Column(name="offline", type="boolean", nullable=false)
     */
    private $offline;

    /**
     * @var string
     *
     * @ORM\Column(name="message_offline", type="string", length=200, nullable=false)
     */
    private $messageOffline;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\CmsStzefThemes
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefThemes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_theme", referencedColumnName="id")
     * })
     */
    private $idTheme;

    /**
     * @var \AppBundle\Entity\CmsStzefCategories
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefCategories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_category_default", referencedColumnName="id")
     * })
     */
    private $idCategoryDefault;

    /**
     * @var \AppBundle\Entity\CmsStzefTypesAccess
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefTypesAccess")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_access_default", referencedColumnName="id")
     * })
     */
    private $idTypeAccessDefault;

    /**
     * @var \AppBundle\Entity\CmsStzefStatesPublication
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefStatesPublication")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_state_publication_default", referencedColumnName="id")
     * })
     */
    private $idStatePublicationDefault;



    /**
     * Set nameSite
     *
     * @param string $nameSite
     * @return CmsStzefGlobalConfiguration
     */
    public function setNameSite($nameSite)
    {
        $this->nameSite = $nameSite;

        return $this;
    }

    /**
     * Get nameSite
     *
     * @return string 
     */
    public function getNameSite()
    {
        return $this->nameSite;
    }

    /**
     * Set offline
     *
     * @param boolean $offline
     * @return CmsStzefGlobalConfiguration
     */
    public function setOffline($offline)
    {
        $this->offline = $offline;

        return $this;
    }

    /**
     * Get offline
     *
     * @return boolean 
     */
    public function getOffline()
    {
        return $this->offline;
    }

    /**
     * Set messageOffline
     *
     * @param string $messageOffline
     * @return CmsStzefGlobalConfiguration
     */
    public function setMessageOffline($messageOffline)
    {
        $this->messageOffline = $messageOffline;

        return $this;
    }

    /**
     * Get messageOffline
     *
     * @return string 
     */
    public function getMessageOffline()
    {
        return $this->messageOffline;
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
     * Set idTheme
     *
     * @param \AppBundle\Entity\CmsStzefThemes $idTheme
     * @return CmsStzefGlobalConfiguration
     */
    public function setIdTheme(\AppBundle\Entity\CmsStzefThemes $idTheme = null)
    {
        $this->idTheme = $idTheme;

        return $this;
    }

    /**
     * Get idTheme
     *
     * @return \AppBundle\Entity\CmsStzefThemes 
     */
    public function getIdTheme()
    {
        return $this->idTheme;
    }

    /**
     * Set idCategoryDefault
     *
     * @param \AppBundle\Entity\CmsStzefCategories $idCategoryDefault
     * @return CmsStzefGlobalConfiguration
     */
    public function setIdCategoryDefault(\AppBundle\Entity\CmsStzefCategories $idCategoryDefault = null)
    {
        $this->idCategoryDefault = $idCategoryDefault;

        return $this;
    }

    /**
     * Get idCategoryDefault
     *
     * @return \AppBundle\Entity\CmsStzefCategories 
     */
    public function getIdCategoryDefault()
    {
        return $this->idCategoryDefault;
    }

    /**
     * Set idTypeAccessDefault
     *
     * @param \AppBundle\Entity\CmsStzefTypesAccess $idTypeAccessDefault
     * @return CmsStzefGlobalConfiguration
     */
    public function setIdTypeAccessDefault(\AppBundle\Entity\CmsStzefTypesAccess $idTypeAccessDefault = null)
    {
        $this->idTypeAccessDefault = $idTypeAccessDefault;

        return $this;
    }

    /**
     * Get idTypeAccessDefault
     *
     * @return \AppBundle\Entity\CmsStzefTypesAccess 
     */
    public function getIdTypeAccessDefault()
    {
        return $this->idTypeAccessDefault;
    }

    /**
     * Set idStatePublicationDefault
     *
     * @param \AppBundle\Entity\CmsStzefStatesPublication $idStatePublicationDefault
     * @return CmsStzefGlobalConfiguration
     */
    public function setIdStatePublicationDefault(\AppBundle\Entity\CmsStzefStatesPublication $idStatePublicationDefault = null)
    {
        $this->idStatePublicationDefault = $idStatePublicationDefault;

        return $this;
    }

    /**
     * Get idStatePublicationDefault
     *
     * @return \AppBundle\Entity\CmsStzefStatesPublication 
     */
    public function getIdStatePublicationDefault()
    {
        return $this->idStatePublicationDefault;
    }
}
