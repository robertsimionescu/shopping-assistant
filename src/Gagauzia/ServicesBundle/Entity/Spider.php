<?php

namespace Gagauzia\ServicesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spider
 *
 * @ORM\Table(name="spider")
 * @ORM\Entity
 */
class Spider
{
    /**
     * @var string
     *
     * @ORM\Column(name="part_number", type="string", length=128, nullable=true)
     */
    private $partNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_emag", type="integer", nullable=false)
     */
    private $idEmag;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_site", type="integer", nullable=false)
     */
    private $idSite;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set partNumber
     *
     * @param string $partNumber
     * @return Spider
     */
    public function setPartNumber($partNumber)
    {
        $this->partNumber = $partNumber;

        return $this;
    }

    /**
     * Get partNumber
     *
     * @return string 
     */
    public function getPartNumber()
    {
        return $this->partNumber;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Spider
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Spider
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Spider
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set idEmag
     *
     * @param integer $idEmag
     * @return Spider
     */
    public function setIdEmag($idEmag)
    {
        $this->idEmag = $idEmag;

        return $this;
    }

    /**
     * Get idEmag
     *
     * @return integer 
     */
    public function getIdEmag()
    {
        return $this->idEmag;
    }

    /**
     * Set idSite
     *
     * @param integer $idSite
     * @return Spider
     */
    public function setIdSite($idSite)
    {
        $this->idSite = $idSite;

        return $this;
    }

    /**
     * Get idSite
     *
     * @return integer 
     */
    public function getIdSite()
    {
        return $this->idSite;
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
