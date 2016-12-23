<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefBanners
 *
 * @ORM\Table(name="cms_stzef_banners", indexes={@ORM\Index(name="fk_cms_stzef_banners_cms_stzef_sections1_idx", columns={"id_section_theme"})})
 * @ORM\Entity
 */
class CmsStzefBanners
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="if_main", type="boolean", nullable=false)
     */
    private $ifMain;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * @return CmsStzefBanners
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
     * Set ifMain
     *
     * @param boolean $ifMain
     * @return CmsStzefBanners
     */
    public function setIfMain($ifMain)
    {
        $this->ifMain = $ifMain;

        return $this;
    }

    /**
     * Get ifMain
     *
     * @return boolean 
     */
    public function getIfMain()
    {
        return $this->ifMain;
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
     * Set idSectionTheme
     *
     * @param \AppBundle\Entity\CmsStzefSections $idSectionTheme
     * @return CmsStzefBanners
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
