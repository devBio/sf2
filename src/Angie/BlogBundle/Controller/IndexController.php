<?php

namespace Angie\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
//use Angie\BlogBundle\Entity\Category;
use Angie\BlogBundle\Entity\Post;
class IndexController extends Controller
{
    /**
     * @Template("AngieBlogBundle:Default:homePage.html.twig")
     */
    public function indexAction()
    {
		/*
		$category = new Category();
		$category->setName('Category #2');
		
		$em= $this->getDoctrine()->getManager();
		$em->persist($category);
		$em->flush();*/
		/*
		$post = new Post();
		$post->setTitle('Post #4')
			->setBody('lorem Ipsum de Cookies ')
			->setIsPublished(false);
		
		$em= $this->getDoctrine()->getManager();
		$em->persist($post);
		$em->flush();*/
		
    	/*
		$repository = $this->getDoctrine()->getRepository("AngieBlogBundle:Category");
		$category = $repository->find(1);
		
		$repository = $this->getDoctrine()->getRepository("AngieBlogBundle:Post");
		$post = $repository->find(1);
		
		$category->getPosts()->add($post);
		
		$em= $this->getDoctrine()->getManager();
		$em->flush();
		
		
		$arrayPost = array(	
					array('UserName'=>'Jenni','publish'=>false),
					array('UserName'=>'Laurent','publish'=>true),
					array('UserName'=>'Bouli','publish'=>0),
					array('UserName'=>'Jerome','publish'=>true)
			
		);
		return array('arrayPost' => $arrayPost);*/
    	
    	
    	$posts = $this->getDoctrine()
    			->getRepository("AngieBlogBundle:Post")
    			->getPublishedPosts();
    
    	$categories = $this->getDoctrine()
    	->getRepository("AngieBlogBundle:Category")
    	->getCategories();
    	
    	return array('arrayPost' =>$posts,'arrayCategories' =>$categories);
    	
/*
    	$message = \Swift_Message::newInstance()
    		->setSubject('Test Email SF2')
    		->setFrom('send@exemple.fr')
    		->setTo('angelique.contal@gmail.com')
    		->setBody($this->renderView('AngieBlogBundle:Default:maquetteMail.html.twig',
				array('name' => 'Angie',
    					'date' => Date('ymd')
    				)));
    
    	$this->get('mailer')->send($message);
    	return array('arrayPost' =>array());*/
    	
    	
    	
    	
    }
}
