<?php

namespace Angie\BlogBundle\Menu;
use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
	public function mainMenu(FactoryInterface $factory,array $options)
	{
		$menu = $factory->createItem('root');
		
		//home
		$menu->addChild($this->container->get('translator')->trans('Home'),array(
			'route'=> 'angie_home',
			'linkAttributes' => array('class' => 'blog-nav-item')
		));
		
		$menu->addChild($this->container->get('translator')->trans('Admin'),array(
				'route'=> 'angie_admin_home',
				'linkAttributes' => array('class' => 'blog-nav-item')
		));
		
		
		
		
		//categories
		$em = $this->container->get('doctrine.orm.entity_manager');
		$categories = $em->getRepository('AngieBlogBundle:Category')->findAll();
		
		foreach($categories as $category){
			$menu->addChild($category->getName(),array(
				'route'=> 'angie_blog_category_view',
				'routeParameters' => array('slug' => $category->getSlug()),
				'linkAttributes' => array('class' => 'blog-nav-item')
				));
		}
		
		
		
		
		
		
		return $menu;
		
	}
}
