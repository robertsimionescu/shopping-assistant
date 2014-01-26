<?php

namespace Gagauzia\ServicesBundle\Services;

use Symfony\Bridge\Doctrine\ManagerRegistry;

use Doctrine\ORM\EntityNotFoundException;

use Gagauzia\ServicesBundle\Entity\Products;

class ProductsService
{

    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * Identifies and returns a spider product db object by its url and site-id
     *
     * @param $id int
     * @return Products
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    public function identifyProduct($id)
    {

        /** @var Products $emagProduct */
        $emagProduct = $this->doctrine->getRepository('GagauziaServicesBundle:Products')->find($id);

        if (!$emagProduct) {
            throw new EntityNotFoundException('No emag product found for id: ' . $id);
        }

        return $emagProduct;
    }

    /**
     * Returns multiple products matching criteria
     *
     * @param $url
     * @param $title
     * @param $price
     * @param $limit
     * @return array
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    public function getTopOffers($url, $title, $price, $limit) {

        /** @var Products $emagProducts */
        $emagProducts = $this->doctrine->getRepository('GagauziaServicesBundle:Products')->findBy(array(), null, $limit);

        if (!$emagProducts) {
            throw new EntityNotFoundException('No emag product found.');
        }

        return $emagProducts;

    }
}