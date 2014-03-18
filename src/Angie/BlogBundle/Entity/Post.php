<?php

namespace Angie\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Angie\BlogBundle\Entity\AbstractEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="Angie\BlogBundle\Entity\PostRepository")
 */
class Post extends AbstractEntity
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
     * @ORM\Column(name="title", type="string", length=200)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    protected $body;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_published", type="boolean")
     */
    protected $is_published;
    
    
    
    
    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="post")
     */
    protected $comments;
    
    /**
     * @ORM\ManyToMany(targetEntity="Category", mappedBy="posts")
     */
    protected $categories;
    
    
    public function __construct($data = array())
    {
    	$this->comments = new ArrayCollection();
    	$this->categories = new ArrayCollection();
    	parent::__construct($data);
    }


}
