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
     * @ORM\Column(name="top_category", type="integer", nullable=true)
     */
    private $topCategory;

    /**
     * @var integer
     *
     * @ORM\Column(name="creator_user", type="integer", nullable=false)
     */
    private $creatorUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



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
     * Set topCategory
     *
     * @param integer $topCategory
     * @return CmsStzefCategories
     */
    public function setTopCategory($topCategory)
    {
        $this->topCategory = $topCategory;

        return $this;
    }

    /**
     * Get topCategory
     *
     * @return integer 
     */
    public function getTopCategory()
    {
        return $this->topCategory;
    }

    /**
     * Set creatorUser
     *
     * @param integer $creatorUser
     * @return CmsStzefCategories
     */
    public function setCreatorUser($creatorUser)
    {
        $this->creatorUser = $creatorUser;

        return $this;
    }

    /**
     * Get creatorUser
     *
     * @return integer 
     */
    public function getCreatorUser()
    {
        return $this->creatorUser;
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
}
