<?php
/**
 * Created by PhpStorm.
 * User: ABU-AHMAD
 * Date: 11/13/2017
 * Time: 11:29 AM
 */

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login(){
        $this->load->view('login');
    }
    public function register(){
        $this->load->view('register');
    }
}