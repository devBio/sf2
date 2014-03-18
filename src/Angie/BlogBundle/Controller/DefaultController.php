<?php

namespace Angie\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
	
    /**
     * @Template("AngieBlogBundle:Default:index.html.twig")
     */
    public function indexAction($name)
    {
	//var_dump($this->getUser());exit();
        //return $this->render('AngieBlogBundle:Default:index.html.twig', array('name' => $name));
	//return array('name' => $name);
		return array('date'=> Date('D - M - Y'),'name' => $name);
    }
    
    
    
    
}
