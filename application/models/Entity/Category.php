<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category Model
 *
 * @Entity
 * @Table(name="Category")
 * @author  Feras AlSouri <feras.el.souri@gmail.com>
 */
class Category
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=32, unique=true, nullable=false)
     */
    protected $name;

    /**
     * @OneToMany(targetEntity="Post", mappedBy="category_id")
     */
    protected $posts;

    /**
     * Initialize any collection properties as ArrayCollections
     *
     * http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/association-mapping.html#initializing-collections
     *
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection;
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return category_id
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add Category
     *
     * @param \Entity\Post $posts
     * @return Category_id
     */
    public function addPost(\Entity\Post $posts)
    {
        $this->posts[] = $posts;
        return $this;
    }

    /**
     * Get Posts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategory()
    {
        return $this->posts;
    }

}
