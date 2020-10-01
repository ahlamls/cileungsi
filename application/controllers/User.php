<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 require $_SERVER['DOCUMENT_ROOT'] .'/library/html2pdf_v5.2-master/vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;

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
    $data['a'] = $this->user_model->homeWidget(1);
$data['b'] = $this->user_model->homeWidget(2);
$data['c'] = $this->user_model->homeWidget(3);
$data['d'] = $this->user_model->homeWidget(4);
$data['e'] = $this->user_model->homeWidget(5);
$data['f'] = $this->user_model->homeWidget(6);
$data['g'] = $this->user_model->homeWidget(7);
    
    $data['nama'] = $this->user_model->getUserInfo($aaidi,3);

  	$this->load->view('user/modular/header',$data);
  	$this->load->view('user/home',$data);

      $this->load->view('user/modular/footer',$data);
}
public function Pengaduan() {
  if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /user/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }
    $data['content'] = $this->user_model->pengaduanList();

    $this->load->view('user/modular/header',$data);
    $this->load->view('user/pengaduan',$data);

      $this->load->view('user/modular/footer',$data);
}

public function pengaduanAdd() {
  if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /user/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }
    $data['content'] = "";

    $this->load->view('user/modular/header',$data);
    $this->load->view('user/pengaduan-add',$data);

      $this->load->view('user/modular/footer',$data);
}

public function handlePengaduanAdd(){
    
if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /user/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }

    $this->user_model->handlePengaduanAdd();
    
}

public function handlePengaduanDelete($id){

if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /user/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }

    $this->user_model->handlePengaduanDelete($id);
    
}

public function PengaduanPrint($id){

if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /user/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }
    
    $dr = $_SERVER['DOCUMENT_ROOT'];
    
    $aidi = $this->user_model->getPengaduanInfo($id,1);
    $tanggal = $this->user_model->getPengaduanInfo($id,2);
    $nama = $this->user_model->getPengaduanInfo($id,3);
    $nosa = $this->user_model->getPengaduanInfo($id,4);
    $jenis = $this->user_model->getPengaduanInfo($id,5);
            if ($jenis == 1) {
              $jenis = "Air Mati";
          } else if ($jenis == 2) {
              $jenis = "Air Keruh";
          } else if ($jenis == 3) {
              $jenis = "Bocor";
          } else if ($jenis == 4) {
              $jenis == "Pemakaian Besar";
          } else if ($jenis == 5) {
              $jenis == "Lainnya";
          }

    $alamat = $this->user_model->getPengaduanInfo($id,6);


$content="

  
      <style>
      body{
          padding:10px;
      }
          img {
              height:100px;
          }
          
      </style>


<table style='width: 100%; border: solid 1px #FFFFFF;'>
<tr>
            <td style='width: 30%; border: solid 1px #FFFFFF;'>
<img src='$dr/logo.png' >
</td>
            <td style='width: 70%; border: solid 1px #FFFFFF;'>
            <p>
<h2>PDAM Kabupaten Bogor</h2>
<h4>Cabang Cileungsi</h4>
ALAMAT :Cileungsi Kabupaten Bogor , Jawa Barat , Indonesia <br> TELEPON : +62 022 12345689 </p>
</td>
</tr>
</table>
<hr>
<h4><b>Nomor Pengaduan #$aidi</b></h4>
<table style='width: 100%; border: solid 1px #FFFFFF;'>
    <tr>
            <td style='width: 50%; border: solid 1px #000000;'>

            
<p>
<b>Tanggal :</b> $tanggal <br>
<b>Nama :</b> $nama<br>
<b>No SA:</b> $nosa<br>
<b>Jenis Pengaduan:</b> $jenis<br>
</p>
</td>
    
            <td style='width: 50%; border: solid 1px #000000;'>
      <p> <b>Alamat : </b><br>
      $alamat
      </p></td>
      </tr>
    </table>

";
ob_start();

	$html2pdf = new Html2Pdf('P','A4','fr', true, 'UTF-8', array(15, 15, 15, 15), false); 
	$html2pdf->writeHTML($content);
ob_end_clean();
ob_end_flush();
$date = date("H-i-s-d-m-Y");
	$html2pdf->output("cileungsi-pengaduan-" . $id . " " . $date . ".pdf","I");
	$html2pdf->clean();
	ob_end_clean();
   // $this->load->view('user/pengaduan-print');
    
}


}
