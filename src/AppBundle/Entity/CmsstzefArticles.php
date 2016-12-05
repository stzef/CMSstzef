<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsstzefArticles
 *
 * @ORM\Table(name="CMSstzef_articles", indexes={@ORM\Index(name="fk_CMSstzef_articles_CMSstzef_categories_idx", columns={"id_category"}), @ORM\Index(name="fk_CMSstzef_articles_CMSstzef_users1_idx", columns={"creator_user"}), @ORM\Index(name="fk_CMSstzef_articles_CMSstzef_types_access1_idx", columns={"id_type_access"})})
 * @ORM\Entity
 */
class CmsstzefArticles
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
     * @var integer
     *
     * @ORM\Column(name="id_article", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idArticle;

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
     * @var \AppBundle\Entity\CmsstzefUsers
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsstzefUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="creator_user", referencedColumnName="id_user")
     * })
     */
    private $creatorUser;

    /**
     * @var \AppBundle\Entity\CmsstzefCategories
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsstzefCategories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_category", referencedColumnName="id_category")
     * })
     */
    private $idCategory;



    /**
     * Set name
     *
     * @param string $name
     * @return CmsstzefArticles
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
     * @return CmsstzefArticles
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
     * @return CmsstzefArticles
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
     * Get idArticle
     *
     * @return integer 
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }

    /**
     * Set idTypeAccess
     *
     * @param \AppBundle\Entity\CmsstzefTypesAccess $idTypeAccess
     * @return CmsstzefArticles
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

    /**
     * Set creatorUser
     *
     * @param \AppBundle\Entity\CmsstzefUsers $creatorUser
     * @return CmsstzefArticles
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
     * Set idCategory
     *
     * @param \AppBundle\Entity\CmsstzefCategories $idCategory
     * @return CmsstzefArticles
     */
    public function setIdCategory(\AppBundle\Entity\CmsstzefCategories $idCategory = null)
    {
        $this->idCategory = $idCategory;

        return $this;
    }

    /**
     * Get idCategory
     *
     * @return \AppBundle\Entity\CmsstzefCategories 
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }
}
