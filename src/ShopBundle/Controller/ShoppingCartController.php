<?php

namespace ShopBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Controller which is responsible for the shopping cart
 */
class ShoppingCartController extends Controller
{
    /**
     * Renders the content of the shopping basket
     *
     * @return \ShopBundle\Entity\Product
     *
     * @Route("/shopping-basket", name="shopping_basket")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $items = $em->getRepository('ShopBundle:ShoppingCart')->find(1)->getContainProducts();

        return ['items' => $items];
    }

    /**
     * Adds a product to the shopping cart
     *
     * @param int $productId
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @Route("/shopping-basket/add/{productId}", name="shopping_basket_add", requirements={"productId":"\d+"})
     */
    public function addToBasketAction($productId)
    {
        $em = $this->getDoctrine()->getManager();
        $productRepository = $em->getRepository('ShopBundle:Product');

        if (!$product = $productRepository->find($productId)) {
            throw $this->createNotFoundException();
        }

        // quick and dirty fix since there are no users logged in which can be used to fetch "their" shopping cart
        $basket = $em->getRepository('ShopBundle:ShoppingCart')->find(1);

        $basket->addProduct($product);

        $em->persist($basket);
        $em->flush();

        return $this->redirect($this->generateUrl('shopping_basket'));
    }
}
