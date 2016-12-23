<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefBannerDeta
 *
 * @ORM\Table(name="cms_stzef_banner_deta", indexes={@ORM\Index(name="fk_cms_stzef_banner_deta_cms_stzef_banners1_idx", columns={"cms_stzef_banners_id"})})
 * @ORM\Entity
 */
class CmsStzefBannerDeta
{
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=45, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="content_html", type="text", length=65535, nullable=false)
     */
    private $contentHtml;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\CmsStzefBanners
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CmsStzefBanners")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cms_stzef_banners_id", referencedColumnName="id")
     * })
     */
    private $cmsStzefBanners;



public function __toString()
{
    return $this->name;
}

    /**
     * Set image
     *
     * @param string $image
     * @return CmsStzefBannerDeta
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set contentHtml
     *
     * @param string $contentHtml
     * @return CmsStzefBannerDeta
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cmsStzefBanners
     *
     * @param \AppBundle\Entity\CmsStzefBanners $cmsStzefBanners
     * @return CmsStzefBannerDeta
     */
    public function setCmsStzefBanners(\AppBundle\Entity\CmsStzefBanners $cmsStzefBanners = null)
    {
        $this->cmsStzefBanners = $cmsStzefBanners;

        return $this;
    }

    /**
     * Get cmsStzefBanners
     *
     * @return \AppBundle\Entity\CmsStzefBanners 
     */
    public function getCmsStzefBanners()
    {
        return $this->cmsStzefBanners;
    }
}
