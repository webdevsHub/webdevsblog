<?php

namespace Webdev\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Session;

use Doctrine\ORM\EntityManager;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class PostController extends Controller
{
    /**
     * @Route("/post/{slug}", name="blog_post_view")
     * @Template()
     */
    public function viewAction($slug)
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	
    	// get post
    	$post = $em->getRepository('WebdevBlogBundle:Post')->findOneBySlug($slug);
		if(!$post) {
			throw $this->createNotFoundException('Blogpost ' . $slug . ' wurde nicht gefunden');
		}
		
		// update clicks on first view
		// save slug in session to prevent further clicks updates
		$session = $this->get('session');
		$visited_posts = $session->get('visited_posts', array());
		if(!in_array($slug, $visited_posts)) {
			
			$post->setClicks($post->getClicks() + 1);
			$em->flush();
			
			$visited_posts[] = $slug;
			$session->set('visited_posts', $visited_posts);
			
		}		
    	
        return array('post' => $post);
    }
}
