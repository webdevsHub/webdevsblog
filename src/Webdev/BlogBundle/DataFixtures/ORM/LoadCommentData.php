<?php
namespace Webdev\BlogBundle\DateFixtures\ORM;

use Webdev\BlogBundle\Entity\Comment;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Doctrine\Common\DataFixtures\AbstractFixture;

use Webdev\BlogBundle\Entity\Tag;

use Doctrine\Common\DataFixtures\FixtureInterface;

use Webdev\BlogBundle\Entity\Post;

use Doctrine\ORM\EntityManager;

class LoadCommentData extends AbstractFixture implements OrderedFixtureInterface
{
	public function getOrder()
	{
		return 5;
	}
	
	public function load($manager)
	{
		$comment1 = new Comment();
		$comment1->setPost($this->getReference('post1'));
		$comment1->setUser($this->getReference('manuel'));
		$comment1->setCreatedAt(new \DateTime());
		$comment1->setContent('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.');
		$manager->persist($comment1);
		
		$comment11 = new Comment();
		$comment11->setUser($this->getReference('max'));
		$comment11->setOrigin($comment1);
		$comment11->setCreatedAt(new \DateTime());
		$comment11->setContent('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.');
		$manager->persist($comment11);
		
		$comment111 = new Comment();
		$comment111->setUser($this->getReference('manuel'));
		$comment111->setOrigin($comment11);
		$comment111->setCreatedAt(new \DateTime());
		$comment111->setContent('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.');
		$manager->persist($comment111);
		
		$comment2 = new Comment();
		$comment2->setPost($this->getReference('post1'));
		$comment2->setUser($this->getReference('max'));
		$comment2->setCreatedAt(new \DateTime());
		$comment2->setContent('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.');
		$manager->persist($comment2);
		
		$manager->flush();
		
	}
}