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
		$tag1->setName('symfony 2');
		$tag1->setQuantifier(3);
		
		$tag2 = new Tag();
		$tag2->setName('Tutorial');
		$tag2->setQuantifier(1);
		
		$tag3 = new Tag();
		$tag3->setName('PHP');
		$tag3->setQuantifier(6);
		
		$post = new Post();
		$post->setTitle('symfony2 Tutorial');
		$post->setSlug('symfony2-tutorial');
		$post->setContent('<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>');
		$post->addTag($tag1);
		$post->addTag($tag2);
		$post->addTag($tag3);
		
		$manager->persist($tag1);
		$manager->persist($tag2);
		$manager->persist($tag3);
		$manager->persist($post);
		
		$manager->flush();
	}
}