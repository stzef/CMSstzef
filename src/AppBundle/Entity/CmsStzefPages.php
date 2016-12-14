<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefPages
 *
 * @ORM\Table(name="cms_stzef_pages", uniqueConstraints={@ORM\UniqueConstraint(name="slug_UNIQUE", columns={"slug"})}, indexes={@ORM\Index(name="fk_cms_stzef_pages_cms_stzef_types_pages1_idx", columns={"type_page_id"}), @ORM\Index(name="fk_cms_stzef_pages_cms_stzef_users1_idx", columns={"creator_user"}), @ORM\Index(name="fk_cms_stzef_pages_cms_stzef_categories1_idx", columns={"category_to_show"}), @ORM\Index(name="fk_cms_stzef_pages_cms_stzef_states_publication1_idx", columns={"id_state_publication"}), @ORM\Index(name="fk_cms_stzef_pages_cms_stzef_types_access1_idx", columns={"id_type_access"})})
 * @ORM\Entity
 */
class CmsStzefPages
{
    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=50, nullable=false)
     */
    private $slug;

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
     * @var \AppBundle\Entity\CmsStzefUsers
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="creator_user", referencedColumnName="id")
     * })
     */
    private $creatorUser;

    /**
     * @var \AppBundle\Entity\CmsStzefTypesPages
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefTypesPages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_page_id", referencedColumnName="id")
     * })
     */
    private $typePage;

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
     * @var \AppBundle\Entity\CmsStzefStatesPublication
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefStatesPublication")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_state_publication", referencedColumnName="id")
     * })
     */
    private $idStatePublication;

    /**
     * @var \AppBundle\Entity\CmsStzefCategories
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefCategories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_to_show", referencedColumnName="id")
     * })
     */
    private $categoryToShow;



public function __toString()
{
    return $this->name;
}

    /**
     * Set slug
     *
     * @param string $slug
     * @return CmsStzefPages
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return CmsStzefPages
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
     * @return CmsStzefPages
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
     * Set creatorUser
     *
     * @param \AppBundle\Entity\CmsStzefUsers $creatorUser
     * @return CmsStzefPages
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
     * Set typePage
     *
     * @param \AppBundle\Entity\CmsStzefTypesPages $typePage
     * @return CmsStzefPages
     */
    public function setTypePage(\AppBundle\Entity\CmsStzefTypesPages $typePage = null)
    {
        $this->typePage = $typePage;

        return $this;
    }

    /**
     * Get typePage
     *
     * @return \AppBundle\Entity\CmsStzefTypesPages 
     */
    public function getTypePage()
    {
        return $this->typePage;
    }

    /**
     * Set idTypeAccess
     *
     * @param \AppBundle\Entity\CmsStzefTypesAccess $idTypeAccess
     * @return CmsStzefPages
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
     * Set idStatePublication
     *
     * @param \AppBundle\Entity\CmsStzefStatesPublication $idStatePublication
     * @return CmsStzefPages
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
     * Set categoryToShow
     *
     * @param \AppBundle\Entity\CmsStzefCategories $categoryToShow
     * @return CmsStzefPages
     */
    public function setCategoryToShow(\AppBundle\Entity\CmsStzefCategories $categoryToShow = null)
    {
        $this->categoryToShow = $categoryToShow;

        return $this;
    }

    /**
     * Get categoryToShow
     *
     * @return \AppBundle\Entity\CmsStzefCategories 
     */
    public function getCategoryToShow()
    {
        return $this->categoryToShow;
    }
}
