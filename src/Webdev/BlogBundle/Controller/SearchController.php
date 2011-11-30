<?php

namespace Webdev\BlogBundle\Controller;

use Webdev\BlogBundle\Entity\Tag;

use Doctrine\ORM\EntityManager;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use JMS\SecurityExtraBundle\Annotation\Secure;

class SearchController extends Controller
{
    /**
     * @Route("/tag/{name}", name="blog_search_tag")
     * @Template()
     * @Secure(roles="ROLE_USER")
     */
    public function tagAction($name)
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	
    	// get tag
    	$tag = $em->getRepository('WebdevBlogBundle:Tag')->findOneByName($name);
    	if(!$tag) {
    		throw $this->createNotFoundException('Tag "' . $name . '" ist nicht vorhanden.');
    	}
    	
        return array('tag' => $tag);
    }
}
