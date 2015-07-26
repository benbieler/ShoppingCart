<?php

namespace ShopBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ShopBundle\Entity\Product;
use ShopBundle\Entity\ShoppingCart;

class ShoppingFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $basket = new ShoppingCart();

        $product1 = new Product();
        $product1->setName('Apple iPhone 4S');
        $product1->setDescription('An old but gold smartphone of apple');
        $product1->setAdditionDate(new \DateTime('-2 days ago'));
        $product1->setPrice(399);

        $product2 = new Product();
        $product2->setName('Logitech Keyboard K810');
        $product2->setDescription('A nice keyboard');
        $product2->setPrice(79);
        $product2->setAdditionDate(new \DateTime('6 hours ago'));

        $basket->addProduct($product1);

        foreach ([$product1, $product2, $basket] as $entity) {
            $manager->persist($entity);
        }

        $manager->flush();
    }
}
