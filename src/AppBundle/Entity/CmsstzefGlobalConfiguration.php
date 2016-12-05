<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsstzefGlobalConfiguration
 *
 * @ORM\Table(name="CMSstzef_global_configuration", indexes={@ORM\Index(name="fk_CMSstzef_global_configuration_CMSstzef_states1_idx", columns={"id_state_publication_default"}), @ORM\Index(name="fk_CMSstzef_global_configuration_CMSstzef_types_access1_idx", columns={"id_type_access_default"}), @ORM\Index(name="fk_CMSstzef_global_configuration_CMSstzef_categories1_idx", columns={"id_category_default"}), @ORM\Index(name="fk_CMSstzef_global_configuration_CMSstzef_themes1_idx", columns={"id_theme"})})
 * @ORM\Entity
 */
class CmsstzefGlobalConfiguration
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
     * @var \AppBundle\Entity\CmsstzefThemes
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsstzefThemes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_theme", referencedColumnName="id_theme")
     * })
     */
    private $idTheme;

    /**
     * @var \AppBundle\Entity\CmsstzefCategories
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsstzefCategories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_category_default", referencedColumnName="id_category")
     * })
     */
    private $idCategoryDefault;

    /**
     * @var \AppBundle\Entity\CmsstzefTypesAccess
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsstzefTypesAccess")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_access_default", referencedColumnName="id_type_access")
     * })
     */
    private $idTypeAccessDefault;

    /**
     * @var \AppBundle\Entity\CmsstzefStatesPublication
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsstzefStatesPublication")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_state_publication_default", referencedColumnName="id_state")
     * })
     */
    private $idStatePublicationDefault;



    /**
     * Set nameSite
     *
     * @param string $nameSite
     * @return CmsstzefGlobalConfiguration
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
     * @return CmsstzefGlobalConfiguration
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
     * @return CmsstzefGlobalConfiguration
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
     * @param \AppBundle\Entity\CmsstzefThemes $idTheme
     * @return CmsstzefGlobalConfiguration
     */
    public function setIdTheme(\AppBundle\Entity\CmsstzefThemes $idTheme = null)
    {
        $this->idTheme = $idTheme;

        return $this;
    }

    /**
     * Get idTheme
     *
     * @return \AppBundle\Entity\CmsstzefThemes 
     */
    public function getIdTheme()
    {
        return $this->idTheme;
    }

    /**
     * Set idCategoryDefault
     *
     * @param \AppBundle\Entity\CmsstzefCategories $idCategoryDefault
     * @return CmsstzefGlobalConfiguration
     */
    public function setIdCategoryDefault(\AppBundle\Entity\CmsstzefCategories $idCategoryDefault = null)
    {
        $this->idCategoryDefault = $idCategoryDefault;

        return $this;
    }

    /**
     * Get idCategoryDefault
     *
     * @return \AppBundle\Entity\CmsstzefCategories 
     */
    public function getIdCategoryDefault()
    {
        return $this->idCategoryDefault;
    }

    /**
     * Set idTypeAccessDefault
     *
     * @param \AppBundle\Entity\CmsstzefTypesAccess $idTypeAccessDefault
     * @return CmsstzefGlobalConfiguration
     */
    public function setIdTypeAccessDefault(\AppBundle\Entity\CmsstzefTypesAccess $idTypeAccessDefault = null)
    {
        $this->idTypeAccessDefault = $idTypeAccessDefault;

        return $this;
    }

    /**
     * Get idTypeAccessDefault
     *
     * @return \AppBundle\Entity\CmsstzefTypesAccess 
     */
    public function getIdTypeAccessDefault()
    {
        return $this->idTypeAccessDefault;
    }

    /**
     * Set idStatePublicationDefault
     *
     * @param \AppBundle\Entity\CmsstzefStatesPublication $idStatePublicationDefault
     * @return CmsstzefGlobalConfiguration
     */
    public function setIdStatePublicationDefault(\AppBundle\Entity\CmsstzefStatesPublication $idStatePublicationDefault = null)
    {
        $this->idStatePublicationDefault = $idStatePublicationDefault;

        return $this;
    }

    /**
     * Get idStatePublicationDefault
     *
     * @return \AppBundle\Entity\CmsstzefStatesPublication 
     */
    public function getIdStatePublicationDefault()
    {
        return $this->idStatePublicationDefault;
    }
}
