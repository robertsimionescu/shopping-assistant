<?php

namespace Gagauzia\ServicesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sites
 *
 * @ORM\Table(name="sites")
 * @ORM\Entity
 */
class Sites
{
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="sitename", type="string", length=128, nullable=true)
     */
    private $sitename;

    /**
     * @var string
     *
     * @ORM\Column(name="title_rule", type="string", length=255, nullable=true)
     */
    private $titleRule;

    /**
     * @var string
     *
     * @ORM\Column(name="price_rule", type="string", length=256, nullable=true)
     */
    private $priceRule;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set url
     *
     * @param string $url
     * @return Sites
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
     * Set sitename
     *
     * @param string $sitename
     * @return Sites
     */
    public function setSitename($sitename)
    {
        $this->sitename = $sitename;

        return $this;
    }

    /**
     * Get sitename
     *
     * @return string 
     */
    public function getSitename()
    {
        return $this->sitename;
    }

    /**
     * Set titleRule
     *
     * @param string $titleRule
     * @return Sites
     */
    public function setTitleRule($titleRule)
    {
        $this->titleRule = $titleRule;

        return $this;
    }

    /**
     * Get titleRule
     *
     * @return string 
     */
    public function getTitleRule()
    {
        return $this->titleRule;
    }

    /**
     * Set priceRule
     *
     * @param string $priceRule
     * @return Sites
     */
    public function setPriceRule($priceRule)
    {
        $this->priceRule = $priceRule;

        return $this;
    }

    /**
     * Get priceRule
     *
     * @return string 
     */
    public function getPriceRule()
    {
        return $this->priceRule;
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
