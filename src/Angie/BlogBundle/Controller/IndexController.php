<?php

namespace Angie\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Angie\BlogBundle\Entity\Category;

class IndexController extends Controller
{
    /**
     * @Template("AngieBlogBundle:Default:homePage.html.twig")
     */
    public function indexAction()
    {

		$category = new Category();
		$category->setName('Category #1');
		
		$em= $this->getDoctrine()->getManager();
		$em->persist($category);
		$em->flush();
		
		
		
		$arrayPost = array(	
					array('UserName'=>'Jenni','publish'=>false),
					array('UserName'=>'Laurent','publish'=>true),
					array('UserName'=>'Bouli','publish'=>0),
					array('UserName'=>'Jerome','publish'=>true)
			
		);
		return array('arrayPost' => $arrayPost);
    }
}
