<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsstzefMenus
 *
 * @ORM\Table(name="CMSstzef_menus", indexes={@ORM\Index(name="fk_CMSstzef_menus_type_access1_idx", columns={"id_type_access"}), @ORM\Index(name="fk_CMSstzef_menus_CMSstzef_states1_idx", columns={"id_state_publication"}), @ORM\Index(name="fk_CMSstzef_menus_CMSstzef_users1_idx", columns={"creator_user"})})
 * @ORM\Entity
 */
class CmsstzefMenus
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
     * @ORM\Column(name="link", type="string", length=45, nullable=false)
     */
    private $link;

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
     * @ORM\Column(name="id_menu", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMenu;

    /**
     * @var \AppBundle\Entity\CmsstzefUsers
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsstzefUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="creator_user", referencedColumnName="id_user")
     * })
     */
    private $creatorUser;

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
     * @var \AppBundle\Entity\CmsstzefTypesAccess
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsstzefTypesAccess")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_access", referencedColumnName="id_type_access")
     * })
     */
    private $idTypeAccess;



    /**
     * Set title
     *
     * @param string $title
     * @return CmsstzefMenus
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
     * @return CmsstzefMenus
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
     * Set link
     *
     * @param string $link
     * @return CmsstzefMenus
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set menuMajor
     *
     * @param string $menuMajor
     * @return CmsstzefMenus
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
     * @return CmsstzefMenus
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
     * @return CmsstzefMenus
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
     * Get idMenu
     *
     * @return integer 
     */
    public function getIdMenu()
    {
        return $this->idMenu;
    }

    /**
     * Set creatorUser
     *
     * @param \AppBundle\Entity\CmsstzefUsers $creatorUser
     * @return CmsstzefMenus
     */
    public function setCreatorUser(\AppBundle\Entity\CmsstzefUsers $creatorUser = null)
    {
        $this->creatorUser = $creatorUser;

        return $this;
    }

    /**
     * Get creatorUser
     *
     * @return \AppBundle\Entity\CmsstzefUsers 
     */
    public function getCreatorUser()
    {
        return $this->creatorUser;
    }

    /**
     * Set idStatePublication
     *
     * @param \AppBundle\Entity\CmsstzefStatesPublication $idStatePublication
     * @return CmsstzefMenus
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
     * Set idTypeAccess
     *
     * @param \AppBundle\Entity\CmsstzefTypesAccess $idTypeAccess
     * @return CmsstzefMenus
     */
    public function setIdTypeAccess(\AppBundle\Entity\CmsstzefTypesAccess $idTypeAccess = null)
    {
        $this->idTypeAccess = $idTypeAccess;

        return $this;
    }

    /**
     * Get idTypeAccess
     *
     * @return \AppBundle\Entity\CmsstzefTypesAccess 
     */
    public function getIdTypeAccess()
    {
        return $this->idTypeAccess;
    }
}
