<?php

namespace ShopBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

class ItemManager
{
	/**
	 * @var EntityManagerInterface
	 */
	private $em;

	/**
	 * @var \Doctrine\ORM\EntityRepository
	 */
	private $repository;

	public function __construct(EntityManagerInterface $em)
	{
		$this->em         = $em;
		$this->repository = $em->getRepository('ShopBundle:Product');
	}

	/**
	 * Creates a list which contains all products which can be added to the shopping cart
	 *
	 * @return \ShopBundle\Entity\Product[]
	 */
	public function listProductItems()
	{
		return $this->repository->findAll();
	}
}
