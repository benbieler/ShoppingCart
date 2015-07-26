<?php

namespace ShopBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ShoppingCart
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ShoppingCart
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="ShopBundle\Entity\Product")
     * @ORM\JoinTable(
     *     name="product_to_basket",
     *     joinColumns={@ORM\JoinColumn(name="basket", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="product", referencedColumnName="id")}
     * )
     */
    private $containProducts;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->containProducts = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set containProducts
     *
     * @param Product $containProducts
     *
     * @return ShoppingCart
     */
    public function addProduct(Product $containProducts)
    {
        $this->containProducts->add($containProducts);

        return $this;
    }

    /**
     * Get containProducts
     *
     * @return array
     */
    public function getContainProducts()
    {
        return $this->containProducts;
    }
}

