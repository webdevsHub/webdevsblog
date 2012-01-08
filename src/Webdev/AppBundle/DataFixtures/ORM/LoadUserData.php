<?php
namespace Webdev\AppBundle\DateFixtures\ORM;

use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;

use Webdev\AppBundle\Entity\User;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Doctrine\Common\DataFixtures\AbstractFixture;

use Doctrine\Common\DataFixtures\FixtureInterface;

use Doctrine\ORM\EntityManager;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
	private $container;
	
	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
	}
	
	public function getOrder()
	{
		return 2;
	}
	
	public function load($manager)
	{
		$factory = $this->container->get('security.encoder_factory');
		
		$user1 = new User();
		$user1->setUsername('manuel');
		
		$encoder = $factory->getEncoder($user1);
		$password = $encoder->encodePassword('manuel', $user1->getSalt());
		
		$user1->setPassword($password);
		$user1->addRole($this->getReference('role_user'));
		
		$user2 = new User();
		$user2->setUsername('max');
		
		$encoder = $factory->getEncoder($user1);
		$password = $encoder->encodePassword('max', $user1->getSalt());
		
		$user2->setPassword($password);
		$user2->addRole($this->getReference('role_user'));
		
		$admin = new User();
		$admin->setUsername('admin');
		
		$password = $encoder->encodePassword('adminpass', $admin->getSalt());
		
		$admin->setPassword($password);
		$admin->addRole($this->getReference('role_admin'));
		
		$manager->persist($user1);
		$manager->persist($user2);
		$manager->persist($admin);
		
		$manager->flush();
		
		$this->addReference('manuel', $user1);
		$this->addReference('max', $user2);
		$this->addReference('admin', $admin);
	}
}