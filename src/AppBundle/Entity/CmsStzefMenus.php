<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefMenus
 *
 * @ORM\Table(name="cms_stzef_menus", indexes={@ORM\Index(name="fk_CMSstzef_menus_type_access1_idx", columns={"id_type_access"}), @ORM\Index(name="fk_CMSstzef_menus_CMSstzef_states1_idx", columns={"id_state_publication"}), @ORM\Index(name="fk_CMSstzef_menus_CMSstzef_users1_idx", columns={"creator_user"}), @ORM\Index(name="fk_cms_stzef_menus_cms_stzef_pages1_idx", columns={"page_id"})})
 * @ORM\Entity
 */
class CmsStzefMenus
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=45, nullable=false)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="menu_major", type="string", length=45, nullable=false)
     */
    private $menuMajor;

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
     *   @ORM\JoinColumn(name="page_id", referencedColumnName="id")
     * })
     */
    private $page;

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
     * Set title
     *
     * @param string $title
     * @return CmsStzefMenus
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
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
     * Set menuMajor
     *
     * @param string $menuMajor
     * @return CmsStzefMenus
     */
    public function setMenuMajor($menuMajor)
    {
        $this->menuMajor = $menuMajor;

        return $this;
    }

    /**
     * Get menuMajor
     *
     * @return string 
     */
    public function getMenuMajor()
    {
        return $this->menuMajor;
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
}
