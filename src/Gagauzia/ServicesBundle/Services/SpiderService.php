<?php

namespace Gagauzia\ServicesBundle\Services;

use Symfony\Bridge\Doctrine\ManagerRegistry;

use Doctrine\ORM\EntityNotFoundException;

use Gagauzia\ServicesBundle\Entity\Spider;

class SpiderService
{

    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * Identifies and returns a spider product db object by its url and site-id
     *
     * @param $siteId int
     * @param $urlPath string
     * @return Spider
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    public function identifyProduct($siteId, $urlPath)
    {

        /** @var Spider $spiderProduct */
        $spiderProduct = $this->doctrine->getRepository('GagauziaServicesBundle:Spider')->findOneBy(array('idSite' => $siteId, 'url' => $urlPath));

        if (!$spiderProduct) {
            throw new EntityNotFoundException('No spider product found for url: ' . $urlPath);
        }

        return $spiderProduct;
    }

}