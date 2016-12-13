<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefParameters
 *
 * @ORM\Table(name="cms_stzef_parameters", uniqueConstraints={@ORM\UniqueConstraint(name="cparam_UNIQUE", columns={"cparam"})})
 * @ORM\Entity
 */
class CmsStzefParameters
{
    /**
     * @var string
     *
     * @ORM\Column(name="cparam", type="string", length=20, nullable=false)
     */
    private $cparam;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
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
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=5)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



public function __toString()
{
    return $this->name;
}

    /**
     * Set cparam
     *
     * @param string $cparam
     * @return CmsStzefParameters
     */
    public function setCparam($cparam)
    {
        $this->cparam = $cparam;

        return $this;
    }

    /**
     * Get cparam
     *
     * @return string 
     */
    public function getCparam()
    {
        return $this->cparam;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return CmsStzefParameters
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

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
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    public function getValue()
    {
        if($this->type == "TEXT"){
            return $this->valueText;
        }else if ($this->type == "BOOL") {
            return $this->valueBool;
        }else if ($this->type == "INT") {
            return $this->valueInt;
        }
        return null;
    }
}
