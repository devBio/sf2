<?php

namespace Angie\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class IndexController extends Controller
{
    /**
     * @Template("AngieBlogBundle:Default:homePage.html.twig")
     */
    public function indexAction()
    {
	//var_dump($this->getUser());exit();
        //return $this->render('AngieBlogBundle:Default:exoTwigArray.html.twig', array('name' => $name));
	//return array('name' => $name);
		$arrayPost = array(	
					array('UserName'=>'Jenni','publish'=>false),
					array('UserName'=>'Laurent','publish'=>true),
					array('UserName'=>'Bouli','publish'=>0),
					array('UserName'=>'Jerome','publish'=>true)
			
		);
		return array('arrayPost' => $arrayPost);
    }
}
