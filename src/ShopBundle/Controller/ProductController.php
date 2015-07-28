<?php

namespace ShopBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ShopBundle\Entity\Product;
use ShopBundle\Form\CreateProduct;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller which is responsible for the product management
 */
class ProductController extends Controller
{
    /**
     * Loads the recent products
     *
     * @Route("/", name="product_index")
     * @Template()
     */
    public function indexAction()
    {
        $productRepository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('ShopBundle:Product');

        return ['products' => $productRepository->findRecentLatestProducts()];
    }

    /**
     * Creates a new product
     *
     * @param Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @Template()
     * @Route("/create-product", name="product_create")
     * @Method({"GET", "POST"})
     */
    public function createAction(Request $request)
    {
        $model = new Product();
        $form = $this->createForm(new CreateProduct(), $model);
        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $model->setAdditionDate(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($model);
            $em->flush();

            return $this->redirect($this->generateUrl('product_index'));
        }

        return ['form' => $form->createView(), 'errors' => $form->getErrors()];
    }
}
