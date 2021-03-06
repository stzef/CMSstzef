<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\EntityExtend\CmsStzefParametersExtend;


/**
 * CmsStzefParameters
 *
 * @ORM\Table(name="cms_stzef_parameters", uniqueConstraints={@ORM\UniqueConstraint(name="cparam_UNIQUE", columns={"cparam"})})
 * @ORM\Entity
 */
class CmsStzefParameters extends CmsStzefParametersExtend
{ 
    /**
     * @var string
     *
     * @ORM\Column(name="cparam", type="string", length=20, nullable=false)
     */
    protected $cparam;

    /**
     * @var integer
     *
     * @ORM\Column(name="cgroup", type="integer", nullable=true)
     */
    protected $cgroup;

    /**
     * @var string
     *
     * @ORM\Column(name="ngroup", type="string", length=45, nullable=true)
     */
    protected $ngroup;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=false)
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="value_text", type="text", length=65535, nullable=true)
     */
    protected $valueText;

    /**
     * @var boolean
     *
     * @ORM\Column(name="value_bool", type="boolean", nullable=true)
     */
    protected $valueBool;

    /**
     * @var integer
     *
     * @ORM\Column(name="value_int", type="integer", nullable=true)
     */
    protected $valueInt;

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=5)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;



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
     * Set cgroup
     *
     * @param integer $cgroup
     * @return CmsStzefParameters
     */
    public function setCgroup($cgroup)
    {
        $this->cgroup = $cgroup;

        return $this;
    }

    /**
     * Get cgroup
     *
     * @return integer 
     */
    public function getCgroup()
    {
        return $this->cgroup;
    }

    /**
     * Set ngroup
     *
     * @param string $ngroup
     * @return CmsStzefParameters
     */
    public function setNgroup($ngroup)
    {
        $this->ngroup = $ngroup;

        return $this;
    }

    /**
     * Get ngroup
     *
     * @return string 
     */
    public function getNgroup()
    {
        return $this->ngroup;
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
}
