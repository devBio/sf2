<?php

namespace Angie\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Angie\BlogBundle\Entity\AbstractEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Post
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Angie\BlogBundle\Entity\CategoryRepository")
 */
class Category extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    protected $name;
    
    
    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=55, unique=true)
     */
    protected $slug;
    
    
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Post",mappedBy="categories")
     */
    protected $posts;
    
    public function __construct($data = array())
    {
    	$this->posts = new ArrayCollection();
    	parent::__construct($data);
    }

  


}
