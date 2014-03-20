<?php

namespace Angie\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Httpfoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Angie\BlogBundle\Entity\Post;
use Angie\BlogBundle\Form\Type\PostType;


class CategoryController extends Controller
{
	

	/**
	 * @Template("AngieBlogBundle:Default:CategoryView.html.twig")
	 */
	public function viewAction($slug)
	{
		$repository = $this->getDoctrine()->getRepository('AngieBlogBundle:Category');
		$categ = $repository->findOneBySlug($slug);
		 
		if (!$categ) {
			throw $this->createNotFoundException($this->get('translator')->trans('This category does not exist'));
		}
		 
		 
		 
		 
		return array('category'=> $categ);
	}
}