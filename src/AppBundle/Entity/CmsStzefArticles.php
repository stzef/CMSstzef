<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefArticles
 *
 * @ORM\Table(name="cms_stzef_articles", indexes={@ORM\Index(name="fk_CMSstzef_articles_CMSstzef_users1_idx", columns={"creator_user"}), @ORM\Index(name="fk_CMSstzef_articles_CMSstzef_types_access1_idx", columns={"id_type_access"}), @ORM\Index(name="fk_cms_stzef_articles_cms_stzef_categories1_idx", columns={"id_category"}), @ORM\Index(name="fk_cms_stzef_articles_cms_stzef_states_publication1_idx", columns={"id_state_publication"}), @ORM\Index(name="fk_cms_stzef_articles_cms_stzef_display_types1_idx", columns={"id_display_type"})})
 * @ORM\Entity
 */
class CmsStzefArticles
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
     * @ORM\Column(name="description", type="string", length=200, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="content_html", type="text", length=65535, nullable=false)
     */
    private $contentHtml;

    /**
     * @var string
     *
     * @ORM\Column(name="image_main", type="string", length=45, nullable=true)
     */
    private $imageMain;

    /**
     * @var boolean
     *
     * @ORM\Column(name="if_distinguished", type="boolean", nullable=false)
     */
    private $ifDistinguished;

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
     * @var \AppBundle\Entity\CmsStzefStatesPublication
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefStatesPublication")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_state_publication", referencedColumnName="id")
     * })
     */
    private $idStatePublication;

    /**
     * @var \AppBundle\Entity\CmsStzefDisplayTypes
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefDisplayTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_display_type", referencedColumnName="id")
     * })
     */
    private $idDisplayType;

    /**
     * @var \AppBundle\Entity\CmsStzefCategories
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefCategories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_category", referencedColumnName="id")
     * })
     */
    private $idCategory;

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



public function __toString()
{
    return $this->name;
}

    /**
     * Set name
     *
     * @param string $name
     * @return CmsStzefArticles
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
     * Set description
     *
     * @param string $description
     * @return CmsStzefArticles
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set contentHtml
     *
     * @param string $contentHtml
     * @return CmsStzefArticles
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
     * Set imageMain
     *
     * @param string $imageMain
     * @return CmsStzefArticles
     */
    public function setImageMain($imageMain)
    {
        $this->imageMain = $imageMain;

        return $this;
    }

    /**
     * Get imageMain
     *
     * @return string 
     */
    public function getImageMain()
    {
        return $this->imageMain;
    }

    /**
     * Set ifDistinguished
     *
     * @param boolean $ifDistinguished
     * @return CmsStzefArticles
     */
    public function setIfDistinguished($ifDistinguished)
    {
        $this->ifDistinguished = $ifDistinguished;

        return $this;
    }

    /**
     * Get ifDistinguished
     *
     * @return boolean 
     */
    public function getIfDistinguished()
    {
        return $this->ifDistinguished;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return CmsStzefArticles
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
     * @return CmsStzefArticles
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
     * @return CmsStzefArticles
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
     * Set idStatePublication
     *
     * @param \AppBundle\Entity\CmsStzefStatesPublication $idStatePublication
     * @return CmsStzefArticles
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
     * Set idDisplayType
     *
     * @param \AppBundle\Entity\CmsStzefDisplayTypes $idDisplayType
     * @return CmsStzefArticles
     */
    public function setIdDisplayType(\AppBundle\Entity\CmsStzefDisplayTypes $idDisplayType = null)
    {
        $this->idDisplayType = $idDisplayType;

        return $this;
    }

    /**
     * Get idDisplayType
     *
     * @return \AppBundle\Entity\CmsStzefDisplayTypes 
     */
    public function getIdDisplayType()
    {
        return $this->idDisplayType;
    }

    /**
     * Set idCategory
     *
     * @param \AppBundle\Entity\CmsStzefCategories $idCategory
     * @return CmsStzefArticles
     */
    public function setIdCategory(\AppBundle\Entity\CmsStzefCategories $idCategory = null)
    {
        $this->idCategory = $idCategory;

        return $this;
    }

    /**
     * Get idCategory
     *
     * @return \AppBundle\Entity\CmsStzefCategories 
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * Set creatorUser
     *
     * @param \AppBundle\Entity\CmsStzefUsers $creatorUser
     * @return CmsStzefArticles
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
     * @return CmsStzefArticles
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
