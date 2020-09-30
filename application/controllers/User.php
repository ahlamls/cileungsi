<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        //$this->config->load('asede', TRUE);
        $this->load->library('session');
        $this->load->database();
    }
	public function index()
	{
	    //cek apa udah login atau belum
		$this->load->view('/user/home');
	}
	
	public function login() {
	    
	}
}
