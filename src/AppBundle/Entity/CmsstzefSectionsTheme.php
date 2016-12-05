<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsstzefSectionsTheme
 *
 * @ORM\Table(name="CMSstzef_sections_theme", indexes={@ORM\Index(name="fk_CMSstzef_sections_theme_CMSstzef_themes1_idx", columns={"id_theme"}), @ORM\Index(name="fk_CMSstzef_sections_theme_CMSstzef_sections1_idx", columns={"id_section_theme"})})
 * @ORM\Entity
 */
class CmsstzefSectionsTheme
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_sections_theme", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSectionsTheme;

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
     * @var \AppBundle\Entity\CmsstzefThemes
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsstzefThemes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_theme", referencedColumnName="id_theme")
     * })
     */
    private $idTheme;



    /**
     * Get idSectionsTheme
     *
     * @return integer 
     */
    public function getIdSectionsTheme()
    {
        return $this->idSectionsTheme;
    }

    /**
     * Set idSectionTheme
     *
     * @param \AppBundle\Entity\CmsstzefSections $idSectionTheme
     * @return CmsstzefSectionsTheme
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

    /**
     * Set idTheme
     *
     * @param \AppBundle\Entity\CmsstzefThemes $idTheme
     * @return CmsstzefSectionsTheme
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
}
