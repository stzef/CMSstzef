<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsstzefCategories
 *
 * @ORM\Table(name="CMSstzef_categories", indexes={@ORM\Index(name="fk_CMSstzef_categories_CMSstzef_types_access1_idx", columns={"id_type_access"}), @ORM\Index(name="fk_CMSstzef_categories_CMSstzef_states1_idx", columns={"id_state_publication"}), @ORM\Index(name="fk_CMSstzef_categories_CMSstzef_users1_idx", columns={"creator_user"})})
 * @ORM\Entity
 */
class CmsstzefCategories
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
     * @var string
     *
     * @ORM\Column(name="category_major", type="string", length=45, nullable=false)
     */
    private $categoryMajor;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_type_access", type="integer", nullable=false)
     */
    private $idTypeAccess;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_state_publication", type="integer", nullable=false)
     */
    private $idStatePublication;

    /**
     * @var integer
     *
     * @ORM\Column(name="creator_user", type="integer", nullable=false)
     */
    private $creatorUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_category", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCategory;



    /**
     * Set name
     *
     * @param string $name
     * @return CmsstzefCategories
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
     * @return CmsstzefCategories
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
     * @return CmsstzefCategories
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
     * Set categoryMajor
     *
     * @param string $categoryMajor
     * @return CmsstzefCategories
     */
    public function setCategoryMajor($categoryMajor)
    {
        $this->categoryMajor = $categoryMajor;

        return $this;
    }

    /**
     * Get categoryMajor
     *
     * @return string 
     */
    public function getCategoryMajor()
    {
        return $this->categoryMajor;
    }

    /**
     * Set idTypeAccess
     *
     * @param integer $idTypeAccess
     * @return CmsstzefCategories
     */
    public function setIdTypeAccess($idTypeAccess)
    {
        $this->idTypeAccess = $idTypeAccess;

        return $this;
    }

    /**
     * Get idTypeAccess
     *
     * @return integer 
     */
    public function getIdTypeAccess()
    {
        return $this->idTypeAccess;
    }

    /**
     * Set idStatePublication
     *
     * @param integer $idStatePublication
     * @return CmsstzefCategories
     */
    public function setIdStatePublication($idStatePublication)
    {
        $this->idStatePublication = $idStatePublication;

        return $this;
    }

    /**
     * Get idStatePublication
     *
     * @return integer 
     */
    public function getIdStatePublication()
    {
        return $this->idStatePublication;
    }

    /**
     * Set creatorUser
     *
     * @param integer $creatorUser
     * @return CmsstzefCategories
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
     * Get idCategory
     *
     * @return integer 
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }
}
