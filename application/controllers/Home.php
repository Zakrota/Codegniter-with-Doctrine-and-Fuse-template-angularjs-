<?php
/**
 * Created by PhpStorm.
 * User: ABU-AHMAD
 * Date: 11/8/2017
 * Time: 6:54 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

//use \Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ClassMetadata;


class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $em = $this->doctrine->em;
        $db = $this->db;
        $this->load->model('Postmodel');

    }

    public function index()
    {

        $this->load->view('home');
    }

    public function view()
    {


        $records = $this->Postmodel->viewlist();

        $record = json_encode($records);
        echo $record;


    }


    public function listview()
    {

        $this->load->view('listview');

    }

    public function edit($id)
    {

        $x = $this->Postmodel->editItem($id);
        var_dump($x);
    }

    public function post()
    {
        $this->load->view('post');
    }

    public function add()
    {


        $data = json_decode(file_get_contents("php://input"));

        $nameofCategory = $data->category;
        $title = $data->title;
        $description = $data->description;
        //This is function return from Postmodel model  is insert data on the database

        $this->Postmodel->add_post($nameofCategory, $title, $description);

    }

    public function update( )
    {

        $data = json_decode(file_get_contents("php://input"));

        var_dump($data);
        $em = $this->doctrine->em;


        $post = new Entity\Post();

        $id = $data->id;
        $title = $data->title;
        $description =  $data->description;


        $this->Postmodel->updateItem($title, $description, $id);

    }

    public function delete($id)
    {

        $this->Postmodel->deleteItem( $id);

    }


}