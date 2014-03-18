<?php

namespace Angie\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostRepository extends EntityRepository
{
	public function getPublishedPosts(){
		return $this->findBy(array('is_published' => true), array('created' =>'DESC'));
	}
}
