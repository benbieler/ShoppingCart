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
            'No product found for id '.$id
        );
    }
        $form = $this->createFormBuilder()
            ->add('name', 'text')
            ->add('save', 'submit')
            ->getForm();


        $form -> $this->createForm(add('button', 'submit'));
        return $this->render('ShopBundle:Default:index.html.twig', array('product' => $products), array('form' => $form->createView()));

	}
    /*
     * @Route("/selected", name="_selected")
     * @Template
     */
    public function  selectedAction()
    {
        return $this->render('ShopBundle:Default:selectedItems.html.twig');
    }
}
