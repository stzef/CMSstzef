<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsStzefContracts
 *
 * @ORM\Table(name="cms_stzef_contracts")
 * @ORM\Entity
 */
class CmsStzefContracts
{
    /**
     * @var string
     *
     * @ORM\Column(name="proceso", type="string", length=45, nullable=false)
     */
    private $proceso;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", length=65535, nullable=true)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="objeto", type="integer", nullable=false)
     */
    private $objeto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="apertura", type="date", nullable=false)
     */
    private $apertura;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="aclaracion", type="date", nullable=false)
     */
    private $aclaracion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cierre", type="date", nullable=false)
     */
    private $cierre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="adjudicion", type="date", nullable=false)
     */
    private $adjudicion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set proceso
     *
     * @param string $proceso
     * @return CmsStzefContracts
     */
    public function setProceso($proceso)
    {
        $this->proceso = $proceso;

        return $this;
    }

    /**
     * Get proceso
     *
     * @return string 
     */
    public function getProceso()
    {
        return $this->proceso;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return CmsStzefContracts
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set objeto
     *
     * @param integer $objeto
     * @return CmsStzefContracts
     */
    public function setObjeto($objeto)
    {
        $this->objeto = $objeto;

        return $this;
    }

    /**
     * Get objeto
     *
     * @return integer 
     */
    public function getObjeto()
    {
        return $this->objeto;
    }

    /**
     * Set apertura
     *
     * @param \DateTime $apertura
     * @return CmsStzefContracts
     */
    public function setApertura($apertura)
    {
        $this->apertura = $apertura;

        return $this;
    }

    /**
     * Get apertura
     *
     * @return \DateTime 
     */
    public function getApertura()
    {
        return $this->apertura;
    }

    /**
     * Set aclaracion
     *
     * @param \DateTime $aclaracion
     * @return CmsStzefContracts
     */
    public function setAclaracion($aclaracion)
    {
        $this->aclaracion = $aclaracion;

        return $this;
    }

    /**
     * Get aclaracion
     *
     * @return \DateTime 
     */
    public function getAclaracion()
    {
        return $this->aclaracion;
    }

    /**
     * Set cierre
     *
     * @param \DateTime $cierre
     * @return CmsStzefContracts
     */
    public function setCierre($cierre)
    {
        $this->cierre = $cierre;

        return $this;
    }

    /**
     * Get cierre
     *
     * @return \DateTime 
     */
    public function getCierre()
    {
        return $this->cierre;
    }

    /**
     * Set adjudicion
     *
     * @param \DateTime $adjudicion
     * @return CmsStzefContracts
     */
    public function setAdjudicion($adjudicion)
    {
        $this->adjudicion = $adjudicion;

        return $this;
    }

    /**
     * Get adjudicion
     *
     * @return \DateTime 
     */
    public function getAdjudicion()
    {
        return $this->adjudicion;
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
