<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function showAction($id = 10)
    {

        $repository = $this->getDoctrine()
            ->getRepository('ShopBundle:Product');
        $products = $repository->findAll();
        if (!$products) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }
        return $this->render('ShopBundle:Default:index.html.twig', array('product' => $products));

    }
}
