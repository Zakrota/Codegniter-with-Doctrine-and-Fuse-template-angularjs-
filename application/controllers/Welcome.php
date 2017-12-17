<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
		$this->load->library('doctrine');
//
        $category = new Entity\Category;
		$category->setName('Category1');

        $post = new Entity\Post;
        $post->setTitle('First Title');
        $post->setDescription('Hello World');


		$post->setCategory_id($category);


		// When you have set up your database, you can persist these entities:
		 $em = $this->doctrine->em;
		 $em->persist($category);
		 $em->persist($post);
		 $em->flush();


//        $Auth = new Entity\Auth();
//        $Auth->setUsername('Feras AlSouri');
//        $Auth->setEmail('feras.el.souri@gmail.com');
//        $Auth->setPassword('passowrd');
//		 $em = $this->doctrine->em;
//
//        $em->persist($Auth);
//		 $em->flush();

		$this->load->view('welcome_message', array(
			'auth' => $post,
//			'category' => $category,
		));

	}
}
