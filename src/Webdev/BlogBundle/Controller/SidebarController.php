<?php

namespace Webdev\BlogBundle\Controller;

use Webdev\BlogBundle\Entity\Tag;

use Doctrine\ORM\EntityManager;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SidebarController extends Controller
{
    /**
     * @Template()
     */
    public function tagcloudAction()
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	
    	// get all tags
    	$tags = $em->getRepository('WebdevBlogBundle:Tag')->findAll();	
    	
        return array('tags' => $tags);
    }
}
