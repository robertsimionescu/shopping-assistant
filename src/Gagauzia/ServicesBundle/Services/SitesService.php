<?php

namespace Gagauzia\ServicesBundle\Services;

use Symfony\Bridge\Doctrine\ManagerRegistry;

use Doctrine\ORM\EntityNotFoundException;

use Gagauzia\ServicesBundle\Entity\Sites;

class SitesService
{

    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * Identifies and returns a site db object by its url
     *
     * @param $domain
     * @return Sites
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    public function identifySite($domain)
    {

        /** @var Sites $site */
        $site = $this->doctrine->getRepository('GagauziaServicesBundle:Sites')->findOneBy(array('url' => $domain));

        if (!$site) {
            throw new EntityNotFoundException('No product found for url: ' . $domain);
        }

        return $site;
    }

    public function parseUrl($url)
    {

        $parts = parse_url($url);

        if ($parts) {

            if (!isset($parts['path'])) {
                $parts['path'] = '';
            }

            if (isset($parts['host'])) {
                $parts['domain'] = str_replace('www.', '', $parts['host']);
            }

        } else {

            throw new \Exception('Could not parse url.');

        }

        return $parts;
    }

}