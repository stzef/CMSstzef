<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefParameters
 *
 * @ORM\Table(name="cms_stzef_parameters")
 * @ORM\Entity
 */
class CmsStzefParameters
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="value_text", type="text", length=65535, nullable=true)
     */
    private $valueText;

    /**
     * @var boolean
     *
     * @ORM\Column(name="value_bool", type="boolean", nullable=true)
     */
    private $valueBool;

    /**
     * @var integer
     *
     * @ORM\Column(name="value_int", type="integer", nullable=true)
     */
    private $valueInt;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set name
     *
     * @param string $name
     * @return CmsStzefParameters
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
     * Set valueText
     *
     * @param string $valueText
     * @return CmsStzefParameters
     */
    public function setValueText($valueText)
    {
        $this->valueText = $valueText;

        return $this;
    }

    /**
     * Get valueText
     *
     * @return string 
     */
    public function getValueText()
    {
        return $this->valueText;
    }

    /**
     * Set valueBool
     *
     * @param boolean $valueBool
     * @return CmsStzefParameters
     */
    public function setValueBool($valueBool)
    {
        $this->valueBool = $valueBool;

        return $this;
    }

    /**
     * Get valueBool
     *
     * @return boolean 
     */
    public function getValueBool()
    {
        return $this->valueBool;
    }

    /**
     * Set valueInt
     *
     * @param integer $valueInt
     * @return CmsStzefParameters
     */
    public function setValueInt($valueInt)
    {
        $this->valueInt = $valueInt;

        return $this;
    }

    /**
     * Get valueInt
     *
     * @return integer 
     */
    public function getValueInt()
    {
        return $this->valueInt;
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
