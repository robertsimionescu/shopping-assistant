<?php

namespace Gagauzia\ExtensionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Doctrine\ORM\EntityNotFoundException;

use Gagauzia\ServicesBundle\Services\SitesService;
use Gagauzia\ServicesBundle\Services\SpiderService;
use Gagauzia\ServicesBundle\Services\ProductsService;

class DefaultController extends Controller
{
    const ERROR_CODE_INVALID_INFO = 1000;
    const ERROR_CODE_SITE_NOT_FOUND = 1001;

    public function pageLoadedAction(Request $request)
    {
        $url = $request->request->get('url');

        $sitesService = new SitesService($this->getDoctrine());

        try {

            $urlParts = $sitesService->parseUrl($url);

            $site = $sitesService->identifySite($urlParts['domain']);

            $response = array(
                'error' => false,
                'results' => array(
                    'site_id' => $site->getId(),
                    'title_rule' => $site->getTitleRule(),
                    'price_rule' => $site->getPriceRule(),
                )
            );

        } catch (EntityNotFoundException $e) {

            $response = array(
                'error' => true,
                'error_code' => self::ERROR_CODE_SITE_NOT_FOUND,
            );

        } catch (\Exception $e) {

            $response = array(
                'error' => true,
                'error_code' => self::ERROR_CODE_INVALID_INFO,
            );

        }

        return new JsonResponse($response);
    }

    public function getComparePageAction(Request $request)
    {
        $url = $request->request->get('url');
        $title = $request->request->get('title');
        $price = $request->request->get('price');

        $sitesService = new SitesService($this->getDoctrine());

        try {

            if(!is_numeric($price) || (float)$price < 0.001) {
                throw new \Exception('Invalid Price.');
            }

            $price = (float) $price;

            $urlParts = $sitesService->parseUrl($url);

            $site = $sitesService->identifySite($urlParts['domain']);

            $spiderService = new SpiderService($this->getDoctrine());

            $spiderProduct = $spiderService->identifyProduct($site->getId(), $urlParts['path']);

            $productService = new ProductsService($this->getDoctrine());

            $emagProduct = $productService->identifyProduct($spiderProduct->getIdEmag());

            $priceDifference = $price - $emagProduct->getPrice();

            $productInfo = array(
                'title' => $emagProduct->getTitle(),
                'price' => $emagProduct->getPrice(),
                'price_adv' => $priceDifference,
                'price_adv_pct' => round($priceDifference * 100 / (int)$price),
                'image' => $emagProduct->getImg(),
            );

            $outputHtml = $this->render('GagauziaExtensionBundle:Default:compare-page.html.twig', $productInfo);

            $response = array(
                'error' => false,
                'results' => array(
                    'html' => $outputHtml->getContent(),
                )
            );

        } catch (EntityNotFoundException $e) {

            $response = array(
                'error' => true,
                'error_code' => self::ERROR_CODE_SITE_NOT_FOUND,
            );

        } catch (\Exception $e) {

            $response = array(
                'error' => true,
                'error_code' => self::ERROR_CODE_INVALID_INFO,
            );

        }

        return new JsonResponse($response);

    }

}
