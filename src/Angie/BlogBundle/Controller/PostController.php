<?php

namespace Angie\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Httpfoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Angie\BlogBundle\Entity\Post;
use Angie\BlogBundle\Form\Type\PostType;


use Angie\BlogBundle\Entity\Comment;
use Angie\BlogBundle\Form\Type\CommentType;

class PostController extends Controller
{
    /**
     * @Template("AngieBlogBundle:Default:PostNew.html.twig")
     */
    public function newAction(Request $request)
    {
		$post = new Post();
		$form = $this->createForm(new PostType(),$post);
		

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
    
    
    /**
     * @Template("AngieBlogBundle:Default:PostView.html.twig")
     */
    public function viewAction($slug)
    {
    	$repository = $this->getDoctrine()->getRepository('AngieBlogBundle:Post');
    	$post = $repository->findOneBySlug($slug);
    	
    	if (!$post) {
    		throw $this->createNotFoundException($this->get('translator')->trans('This post does not exist'));
    	}
    	
    	//return array('post'=> $post);
    	
    	/*form commentaires*/
    	$comment = new Comment();
    	$comment->setPost($post);
    	$form = $this->createForm(new CommentType(),$comment);    	
    	
    	

    	return array('post'=> $post, 'form' =>$form->createView());
    }
    
    
}
