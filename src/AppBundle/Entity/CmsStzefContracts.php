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
    /**
     * @var string
     */
    private $proccess;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $path;

    /**
     * @var \DateTime
     */
    private $dateApertura;

    /**
     * @var \DateTime
     */
    private $dateAclaracion;

    /**
     * @var \DateTime
     */
    private $dateCierre;

    /**
     * @var \DateTime
     */
    private $dateAdjudicion;


    /**
     * Set proccess
     *
     * @param string $proccess
     * @return CmsStzefContracts
     */
    public function setProccess($proccess)
    {
        $this->proccess = $proccess;

        return $this;
    }

    /**
     * Get proccess
     *
     * @return string 
     */
    public function getProccess()
    {
        return $this->proccess;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return CmsStzefContracts
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
     * Set path
     *
     * @param string $path
     * @return CmsStzefContracts
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set dateApertura
     *
     * @param \DateTime $dateApertura
     * @return CmsStzefContracts
     */
    public function setDateApertura($dateApertura)
    {
        $this->dateApertura = $dateApertura;

        return $this;
    }

    /**
     * Get dateApertura
     *
     * @return \DateTime 
     */
    public function getDateApertura()
    {
        return $this->dateApertura;
    }

    /**
     * Set dateAclaracion
     *
     * @param \DateTime $dateAclaracion
     * @return CmsStzefContracts
     */
    public function setDateAclaracion($dateAclaracion)
    {
        $this->dateAclaracion = $dateAclaracion;

        return $this;
    }

    /**
     * Get dateAclaracion
     *
     * @return \DateTime 
     */
    public function getDateAclaracion()
    {
        return $this->dateAclaracion;
    }

    /**
     * Set dateCierre
     *
     * @param \DateTime $dateCierre
     * @return CmsStzefContracts
     */
    public function setDateCierre($dateCierre)
    {
        $this->dateCierre = $dateCierre;

        return $this;
    }

    /**
     * Get dateCierre
     *
     * @return \DateTime 
     */
    public function getDateCierre()
    {
        return $this->dateCierre;
    }

    /**
     * Set dateAdjudicion
     *
     * @param \DateTime $dateAdjudicion
     * @return CmsStzefContracts
     */
    public function setDateAdjudicion($dateAdjudicion)
    {
        $this->dateAdjudicion = $dateAdjudicion;

        return $this;
    }

    /**
     * Get dateAdjudicion
     *
     * @return \DateTime 
     */
    public function getDateAdjudicion()
    {
        return $this->dateAdjudicion;
    }
}
