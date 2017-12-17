<?php

namespace Entity;use Doctrine\Common\Collections\ArrayCollection;
/**
 * User Model
 *
 * @Entity
 * @Table(name="post")
 * @author  Joseph Wynn <joseph@wildlyinaccurate.com>
 */
class Post
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
	protected $title;

	/**
	 * @Column(type="string", length=64, nullable=false)
	 */
	protected $description;

    /**
     * @ManyToOne(targetEntity="Category")
     * @JoinColumn(name="category_id", referencedColumnName="id")
     */
	protected $category_id;




	public function setCategory_id(Category $group)
	{
		$this->category_id = $group;

		// The association must be defined in both directions
		if ( ! $group->getCategory()->contains($this))
		{
			$group->addPost($this);
		}
	}


    /**
	 * Encrypt the password before we store it
	 *
	 * @param	string	$title
	 * @return	void
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getTitle(){
	    return $this->title;
    }

	public function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}


	public function getId()
	{
		return $this->id;
	}



	public function getDescription()
	{
		return $this->description;
	}



	public function  getCategory_id(){
	    return $this->category_id;
    }

}
