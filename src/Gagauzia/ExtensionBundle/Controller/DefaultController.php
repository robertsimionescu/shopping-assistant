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
                'error'   => false,
                'results' => array(
                    'site_id'    => $site->getId(),
                    'title_rule' => $site->getTitleRule(),
                    'price_rule' => $site->getPriceRule(),
                )
            );

        } catch (EntityNotFoundException $e) {

            $response = array(
                'error'         => true,
                'error_message' => $e->getMessage(),
                'error_code'    => self::ERROR_CODE_SITE_NOT_FOUND,
            );

        } catch (\Exception $e) {

            $response = array(
                'error'         => true,
                'error_message' => $e->getMessage(),
                'error_code'    => self::ERROR_CODE_INVALID_INFO,
            );

        }

        return new JsonResponse($response);
    }

    public function getOffersPageAction(Request $request)
    {
        $url = $request->request->get('url');
        $title = $request->request->get('title');
        $price = $request->request->get('price');

        try {

            $productService = new ProductsService($this->getDoctrine());

            $emagProduct1 = $productService->identifyProduct(1);
            $emagProduct2 = $productService->identifyProduct(2);
            $emagProduct3 = $productService->identifyProduct(3);

            $productsInfo = array(
                'products' => array(
                    0 => array(
                        'url'   => $emagProduct1->getUrl(),
                        'title' => $emagProduct1->getTitle(),
                        'price' => $emagProduct1->getPrice(),
                        'wow'   => 25,
                        'image' => $emagProduct1->getImg(),
                    ),
                    1 => array(
                        'url'   => $emagProduct2->getUrl(),
                        'title' => $emagProduct2->getTitle(),
                        'price' => $emagProduct2->getPrice(),
                        'wow'   => 20,
                        'image' => $emagProduct2->getImg(),
                    ),
                    2 => array(
                        'url'   => $emagProduct3->getUrl(),
                        'title' => $emagProduct3->getTitle(),
                        'price' => $emagProduct3->getPrice(),
                        'wow'   => 12,
                        'image' => $emagProduct3->getImg(),
                    ),
                )
            );

            $outputHtml = $this->render('GagauziaExtensionBundle:Default:offers-page.html.twig', $productsInfo);

            $response = array(
                'error'   => false,
                'results' => array(
                    'html'    => $outputHtml->getContent(),
                )
            );

        } catch (EntityNotFoundException $e) {

            $response = array(
                'error'         => true,
                'error_message' => $e->getMessage(),
                'error_code'    => self::ERROR_CODE_SITE_NOT_FOUND,
            );

        } catch (\Exception $e) {

            $response = array(
                'error'         => true,
                'error_message' => $e->getMessage(),
                'error_code'    => self::ERROR_CODE_INVALID_INFO,
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

            if (!is_numeric($price) || (float)$price < 0.001) {
                throw new \Exception('Invalid Price.');
            }

            $price = (float)$price;

            $urlParts = $sitesService->parseUrl($url);

            $site = $sitesService->identifySite($urlParts['domain']);

            $spiderService = new SpiderService($this->getDoctrine());

            $spiderProduct = $spiderService->identifyProduct($site->getId(), $urlParts['path']);

            $productService = new ProductsService($this->getDoctrine());

            $emagProduct = $productService->identifyProduct($spiderProduct->getIdEmag());

            $priceDifference = $price - $emagProduct->getPrice();

            $productInfo = array(
                'title'             => $emagProduct->getTitle(),
                'price'             => floor($emagProduct->getPrice()),
                'price_decimal'     => round(($emagProduct->getPrice() - floor($emagProduct->getPrice())) * 100),
                'price_adv'         => floor($priceDifference),
                'price_adv_decimal' => round(($priceDifference - floor($priceDifference)) * 100),
                'price_adv_pct'     => round($priceDifference * 100 / $price),
                'image'             => $emagProduct->getImg(),
                'emag_product_url'  => $emagProduct->getUrl(),
            );

            $outputHtml = $this->render('GagauziaExtensionBundle:Default:compare-page.html.twig', $productInfo);
            $notificationHtml = $this->render('GagauziaExtensionBundle:Default:notification-page.html.twig', $productInfo);

            $response = array(
                'error'   => false,
                'results' => array(
                    'url'          => $emagProduct->getUrl(),
                    'html'         => $outputHtml->getContent(),
                    'title'        => $emagProduct->getTitle(),
                    'notification' => $notificationHtml->getContent(),
                )
            );

        } catch (EntityNotFoundException $e) {

            $response = array(
                'error'         => true,
                'error_message' => $e->getMessage(),
                'error_code'    => self::ERROR_CODE_SITE_NOT_FOUND,
            );

        } catch (\Exception $e) {

            $response = array(
                'error'         => true,
                'error_message' => $e->getMessage(),
                'error_code'    => self::ERROR_CODE_INVALID_INFO,
            );

        }

        return new JsonResponse($response);

    }

}
