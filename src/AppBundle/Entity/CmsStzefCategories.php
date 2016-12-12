<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefCategories
 *
 * @ORM\Table(name="cms_stzef_categories", indexes={@ORM\Index(name="fk_CMSstzef_categories_CMSstzef_users1_idx", columns={"creator_user"}), @ORM\Index(name="fk_cms_stzef_categories_cms_stzef_categories1_idx", columns={"top_category"})})
 * @ORM\Entity
 */
class CmsStzefCategories
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=200, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\CmsStzefCategories
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefCategories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="top_category", referencedColumnName="id")
     * })
     */
    private $topCategory;

    /**
     * @var \AppBundle\Entity\CmsStzefUsers
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="creator_user", referencedColumnName="id")
     * })
     */
    private $creatorUser;



public function __toString()
{
    return $this->name;
}

    /**
     * Set name
     *
     * @param string $name
     * @return CmsStzefCategories
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
     * @return CmsStzefCategories
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
     * Set description
     *
     * @param string $description
     * @return CmsStzefCategories
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set topCategory
     *
     * @param \AppBundle\Entity\CmsStzefCategories $topCategory
     * @return CmsStzefCategories
     */
    public function setTopCategory(\AppBundle\Entity\CmsStzefCategories $topCategory = null)
    {
        $this->topCategory = $topCategory;

        return $this;
    }

    /**
     * Get topCategory
     *
     * @return \AppBundle\Entity\CmsStzefCategories 
     */
    public function getTopCategory()
    {
        return $this->topCategory;
    }

    /**
     * Set creatorUser
     *
     * @param \AppBundle\Entity\CmsStzefUsers $creatorUser
     * @return CmsStzefCategories
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
}
