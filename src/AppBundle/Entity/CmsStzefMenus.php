<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefMenus
 *
 * @ORM\Table(name="cms_stzef_menus", indexes={@ORM\Index(name="fk_CMSstzef_menus_type_access1_idx", columns={"id_type_access"}), @ORM\Index(name="fk_CMSstzef_menus_CMSstzef_states1_idx", columns={"id_state_publication"}), @ORM\Index(name="fk_CMSstzef_menus_CMSstzef_users1_idx", columns={"creator_user"}), @ORM\Index(name="fk_cms_stzef_menus_cms_stzef_menus1_idx", columns={"top_menu"}), @ORM\Index(name="fk_cms_stzef_menus_cms_stzef_pages1_idx", columns={"page"})})
 * @ORM\Entity
 */
class CmsStzefMenus
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
     * @ORM\Column(name="alias", type="string", length=45, nullable=false)
     */
    private $alias;

    /**
     * @var integer
     *
     * @ORM\Column(name="orden", type="integer", nullable=false)
     */
    private $orden;

    /**
     * @var string
     *
     * @ORM\Column(name="target", type="string", nullable=false)
     */
    private $target;

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
     * @var \AppBundle\Entity\CmsStzefPages
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefPages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="page", referencedColumnName="id")
     * })
     */
    private $page;

    /**
     * @var \AppBundle\Entity\CmsStzefMenus
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefMenus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="top_menu", referencedColumnName="id")
     * })
     */
    private $topMenu;

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
     * @var \AppBundle\Entity\CmsStzefUsers
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="creator_user", referencedColumnName="id")
     * })
     */
    private $creatorUser;

    /**
     * @var \AppBundle\Entity\CmsStzefStatesPublication
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefStatesPublication")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_state_publication", referencedColumnName="id")
     * })
     */
    private $idStatePublication;



public function __toString()
{
    return $this->name;
}

    /**
     * Set name
     *
     * @param string $name
     * @return CmsStzefMenus
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
     * Set alias
     *
     * @param string $alias
     * @return CmsStzefMenus
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     * @return CmsStzefMenus
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return integer 
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set target
     *
     * @param string $target
     * @return CmsStzefMenus
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return string 
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set ifMain
     *
     * @param boolean $ifMain
     * @return CmsStzefMenus
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
     * Set page
     *
     * @param \AppBundle\Entity\CmsStzefPages $page
     * @return CmsStzefMenus
     */
    public function setPage(\AppBundle\Entity\CmsStzefPages $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \AppBundle\Entity\CmsStzefPages 
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set topMenu
     *
     * @param \AppBundle\Entity\CmsStzefMenus $topMenu
     * @return CmsStzefMenus
     */
    public function setTopMenu(\AppBundle\Entity\CmsStzefMenus $topMenu = null)
    {
        $this->topMenu = $topMenu;

        return $this;
    }

    /**
     * Get topMenu
     *
     * @return \AppBundle\Entity\CmsStzefMenus 
     */
    public function getTopMenu()
    {
        return $this->topMenu;
    }

    /**
     * Set idTypeAccess
     *
     * @param \AppBundle\Entity\CmsStzefTypesAccess $idTypeAccess
     * @return CmsStzefMenus
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
     * Set creatorUser
     *
     * @param \AppBundle\Entity\CmsStzefUsers $creatorUser
     * @return CmsStzefMenus
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
     * Set idStatePublication
     *
     * @param \AppBundle\Entity\CmsStzefStatesPublication $idStatePublication
     * @return CmsStzefMenus
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
}
