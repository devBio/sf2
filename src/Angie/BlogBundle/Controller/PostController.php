<?php

namespace Angie\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Httpfoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Angie\BlogBundle\Entity\Post;
use Angie\BlogBundle\Form\Type\PostType;

class PostController extends Controller
{
    /**
     * @Template("AngieBlogBundle:Default:PostNew.html.twig")
     */
    public function newAction(Request $request)
    {
		$post = new Post();
		$form = $this->createForm(new PostType(),$post);
    	return array('form' =>$form->createView());
    	
    }
}
