<?php

namespace Angie\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Angie\BlogBundle\Entity\AbstractEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Post
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="Angie\BlogBundle\Entity\CommentRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Comment extends AbstractEntity
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
     *
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="comments")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id", onDelete="Cascade", nullable=false)
     */
    protected $post;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=50)
     */
    protected $pseudo;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="is_published", type="boolean")
     */
    protected $is_published;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    protected $body;
    
    
    
    /**
     * @ORM\column(type="datetime")
     */
    protected $created;
    
    /**
     * @ORM\column(type="datetime")
     */
    protected $updated;
    
    
    public function __construct($data = array())
    {
    	$this->is_published = false;
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
    	$this->created = new \DateTime();
    	$this->updated = new \DateTime();
    
    }
    

   


}
