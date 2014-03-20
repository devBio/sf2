<?php

namespace Angie\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Httpfoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Angie\BlogBundle\Entity\Comment;
use Angie\BlogBundle\Form\Type\CommentType;


class CommentController extends Controller {
	
	/**
	 * @Template("AngieBlogBundle:Default:CommentNew.html.twig")
	 */
	public function newAction(Request $request)
	{
		$comment = new Comment();
    	$form = $this->createForm(new CommentType(),$comment);    	
    	$form->handleRequest($request);
	
	
	
		if ($form->isValid()) {
			// fait quelque chose comme sauvegarder la tâche dans la bdd
			$em = $this->getDoctrine()->getManager();
			$em->persist($post);
			$em->flush();
				
			$this->get('session')->getFlashBag()->add('success','Sauvegardé');
				
			return $this->redirect($this->generateUrl('angie_post'));
		} else {
			$this->get('session')->getFlashBag()->add('error' , 'Formulaire mal complété');
		}
	
	
	
	
	
		return array('form' =>$form->createView());
		 
	}
	
	
}

?>