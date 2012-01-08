<?php
namespace Webdev\BlogBundle\DateFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Doctrine\Common\DataFixtures\AbstractFixture;

use Webdev\BlogBundle\Entity\Tag;

use Doctrine\Common\DataFixtures\FixtureInterface;

use Webdev\BlogBundle\Entity\Post;

use Doctrine\ORM\EntityManager;

class LoadTagData extends AbstractFixture implements OrderedFixtureInterface
{
	public function getOrder()
	{
		return 3;
	}
	
	public function load($manager)
	{
		$tag1 = new Tag();
		$tag1->setName('Symfony 2');
		$tag1->setQuantifier(3);
		
		$tag2 = new Tag();
		$tag2->setName('Tutorial');
		$tag2->setQuantifier(1);
		
		$tag3 = new Tag();
		$tag3->setName('PHP');
		$tag3->setQuantifier(6);
		
		$tag4 = new Tag();
		$tag4->setName('Doctrine 2');
		$tag4->setQuantifier(2);
		
		$tag5 = new Tag();
		$tag5->setName('Twig');
		$tag5->setQuantifier(10);
		
		$tag6 = new Tag();
		$tag6->setName('Assetic');
		$tag6->setQuantifier(5);
		
		$manager->persist($tag1);
		$manager->persist($tag2);
		$manager->persist($tag3);
		$manager->persist($tag4);
		$manager->persist($tag5);
		$manager->persist($tag6);
		
		$manager->flush();
		
		$this->addReference('tag1', $tag1);
		$this->addReference('tag2', $tag2);
		$this->addReference('tag3', $tag3);
		$this->addReference('tag4', $tag4);
		$this->addReference('tag5', $tag5);
		$this->addReference('tag6', $tag6);
	}
}