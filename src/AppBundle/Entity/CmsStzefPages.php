<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefPages
 *
 * @ORM\Table(name="cms_stzef_pages", indexes={@ORM\Index(name="fk_cms_stzef_pages_cms_stzef_types_pages1_idx", columns={"type_page_id"})})
 * @ORM\Entity
 */
class CmsStzefPages
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
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

    public function __toString()
    {
        return $this->name;
    }
}
