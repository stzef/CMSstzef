<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefSectionsTheme
 *
 * @ORM\Table(name="cms_stzef_sections_theme", indexes={@ORM\Index(name="fk_CMSstzef_sections_theme_CMSstzef_themes1_idx", columns={"id_theme"}), @ORM\Index(name="fk_CMSstzef_sections_theme_CMSstzef_sections1_idx", columns={"id_section_theme"})})
 * @ORM\Entity
 */
class CmsStzefSectionsTheme
{
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
    return $this->idSectionTheme->getName();
}

    /**
     * Set selectorCss
     *
     * @param string $selectorCss
     * @return CmsStzefSectionsTheme
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

    /**
     * Set idTheme
     *
     * @param \AppBundle\Entity\CmsStzefThemes $idTheme
     * @return CmsStzefSectionsTheme
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
     * Set idSectionTheme
     *
     * @param \AppBundle\Entity\CmsStzefSections $idSectionTheme
     * @return CmsStzefSectionsTheme
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
