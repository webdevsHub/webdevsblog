<?php
namespace Webdev\BlogBundle\DateFixtures\ORM;

use Webdev\BlogBundle\Entity\Tag;

use Doctrine\Common\DataFixtures\FixtureInterface;

use Webdev\BlogBundle\Entity\Post;

use Doctrine\ORM\EntityManager;

class LoadPostData implements FixtureInterface
{
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
		
		$post1 = new Post();
		$post1->setTitle('symfony2 Tutorial');
		$post1->setSlug('symfony2-tutorial');
		$post1->setContent('<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>');
		$post1->addTag($tag1);
		$post1->addTag($tag2);
		$post1->addTag($tag3);
		
		$post2 = new Post();
		$post2->setTitle('Assetic und Doctrine 2');
		$post2->setSlug('assetic-und-doctrine-2');
		$post2->setContent('<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>');
		$post2->addTag($tag2);
		$post2->addTag($tag4);
		$post2->addTag($tag5);
		$post2->addTag($tag6);
		
		$post3 = new Post();
		$post3->setTitle('Happy Hacking with symfony');
		$post3->setSlug('Happy-hacking-with-symfony');
		$post3->setContent('<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>');
		$post3->addTag($tag1);
		$post3->addTag($tag6);
		$post3->addTag($tag2);
		$post3->addTag($tag5);
		
		$manager->persist($tag1);
		$manager->persist($tag2);
		$manager->persist($tag3);
		$manager->persist($tag4);
		$manager->persist($tag5);
		$manager->persist($tag6);
		$manager->persist($post1);
		$manager->persist($post2);
		$manager->persist($post3);
		
		$manager->flush();
	}
}