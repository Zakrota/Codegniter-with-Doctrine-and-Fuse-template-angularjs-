<?php
require_once(APPPATH . "models/Entity/Post.php");

use Entity\Post;
use Entity\Category;


/**
 * manipulates data and contains data access logics for Enity 'Post'
 *
 * @final Postmodel
 * @category models
 * @author Feras AlSouri
 */
class Postmodel extends CI_Model
{

    /**
     * @var \Doctrine\ORM\EntityManager $em
     */
    var $em;

    function __construct()
    {
        parent::__construct();
        $this->em = $this->doctrine->em;
    }

    /**
     * Add contact messages to database
     * @param array $contact_form
     * @return bool
     */
    function viewCategory()
    {
        $records = $this->em->getRepository('Entity\\Category')->getResult();

        if (count($records) > 0) {

            return $records;
        } else {
            return false;
        }
    }

    function viewlist()
    {

        $result = $this->em->createQueryBuilder();
        $records = $result->select('c,p')
            ->from('Entity\\Post', 'p')
            ->leftJoin('p.category_id', 'c')
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

        if (count($records) > 0) {

            return $records;
        } else {
            return false;
        }
    }

    function add_post($nameofCategory, $title, $Description)
    {
        /**
         * @var Post $contact
         */
        $category = new Entity\Category;
        $category->setName($nameofCategory);

        $post = new Post();
        $post->setTitle($title);
        $post->setDescription($Description);

        $post->setCategory_id($category);

//
        try {
//save to database
            $this->em->persist($category);

            $this->em->persist($post);
            $this->em->flush();
        } catch (Exception $err) {

            die($err->getMessage());
        }
        return true;
    }

    function updateItem($title, $description, $id)
    {

        $qb = $this->em->createQueryBuilder();
        $q = $qb->update('Entity\\Post', 'u')
            ->set('u.title', $qb->expr()->literal($title))
            ->set('u.description', $qb->expr()->literal($description))
            ->where('u.id = ?1')
            ->setParameter(1, $id)
            ->getQuery();
        $p = $q->execute();
    }

    function editItem($id)
    {
        $result = $this->em->createQueryBuilder();
        $records = $result->select('p')
            ->from('Entity\\Post', 'p')
            ->where('p.id = ?1')
            ->setParameter(1, $id)
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

        return $records;
    }

    function deleteItem($id)
    {
        $q = $this->em->createQuery('delete from Entity\\Post tb where tb.id = '.intval($id));
        $numDeleted = $q->execute();


    }
}