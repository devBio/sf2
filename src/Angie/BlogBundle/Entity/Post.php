<?php

namespace Angie\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Angie\BlogBundle\Entity\AbstractEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="Angie\BlogBundle\Entity\PostRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    protected $slug;
    
    

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
     * @ORM\column(type="datetime")
     */
    protected $created;
    
    /**
     * @ORM\column(type="datetime")
     */
    protected $updated;
    
    
    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="post")
     */
    protected $comments;
    
    /**
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="posts")
     */
    protected $categories;
    
    
    
    

    public function __construct($data = array())
    {
    	$this->comments = new ArrayCollection();
    	$this->categories = new ArrayCollection();
    	parent::__construct($data);
    }
    
    
    /**
     * @ORM\PrePersist
     */
    public function setCreatedValue()
    {
    	$this->created = new \DateTime();
    	$this->updated = new \DateTime();
    	
    }
    
    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedValue()
    {
    	$this->updated = new \DateTime();
    	 
    }


}
