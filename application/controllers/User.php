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
      header("Location: /user/home");
    	die();
    
    
    }
    
    
    public function logout()
    {
    
    	$this->session->sess_destroy();
    	header("Location: /user/login");
    	  die("[cileungsi] sudah logout");
    	}
    public function login()
{
  if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
     header("Location: /user/home");
     die("Sudah Login");
    } else {

    }


    // $data['alerttext'] = "";
    // $data['alertstyle'] = "display:none";
    //
    // if (isset($_GET['msg'])) {
    // 			$data['alerttext'] = htmlentities($_GET['msg']);
    // 			$data['alertstyle'] = "";
    // }

  //	$this->load->view('admin/content/login',$data);
    	$this->load->view('/user/login');

}

public function handleLogin() {
  if (!isset($_POST['email']) OR !isset($_POST['password'])) {
    show_404();
  }
  $asede = $this->user_model->handlelogin();
  if ($asede == "") {
  //  header("Location: /AdminWRBOnline/login/?msg=Email Atau Password Salah");
  die("Email atau password salah");
  } else {
    $this->session->set_userdata('aid', $asede);

    header("Location: /user/home/");
     die("[cileungsi] admin sudah login");
  }
}

public function home()
{
  if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /user/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }
    $data['l'] = "d";

  	$this->load->view('user/modular/header',$data);
  	$this->load->view('user/home',$data);

      $this->load->view('user/modular/footer',$data);
}

}
