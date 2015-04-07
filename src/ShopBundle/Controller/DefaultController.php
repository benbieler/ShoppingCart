<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function listAction()
    {
        /** @var \ShopBundle\Service\ItemManager $manager */
        $manager = $this->get('shoppingcart_manager');

        return $this->render(
            'ShopBundle:Default:index.html.twig',
            array('product' => $manager->listProductItems())
        );
    }
}
