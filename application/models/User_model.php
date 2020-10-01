<?php
class User_model extends CI_Model {

 public function __construct()
 {
         $this->load->database();
          // $this->load->library('config_Writer');


   }
public function handlelogin() {
        $user = $this->db->escape_str($_POST['email']);
        $pass = hash('sha512', $this->db->escape_str($_POST['password']));

        $query = $this->db->query("SELECT * FROM `user` WHERE email = '$user' AND password = '$pass' ");
        if ($query->num_rows() == 1) {
          $row = $query->row();

          if (isset($row))
          {
            $aidi = $row->id;
            return $aidi;
          }




        } else {
          return "";
        }
      }
      
public function getUserInfo($id,$type) {
      $id = $this->db->escape_str($id);
      $query = $this->db->query("SELECT * FROM `user` WHERE `id` = '$id'");

       $row = $query->row();

       if (isset($row))
       {
             if ($type == 1) {
               return $row->id;
             } else if ($type == 2) {
               return $row->email;
             } else if ($type == 3) {
               return $row->name;
             } else if ($type == 4) {
               return $row->level;
             } else {
               return "Invalid Type";
             }
       } else {
         return "tidak diketahui";
       }
    }
    
    
public function pengaduanList() {
        /*
        */
        $asede = "";
        $query = $this->db->query("SELECT * FROM `pengaduan` ORDER BY `pengaduan`.`id` DESC");

        foreach ($query->result() as $row)
        {
          $aidi = $row->id;
          $jenis = $row->jenis;
          $tanggal = $row->tanggal;
          $no = $row->nama;
          $alamat = $row->alamat;
          $nosa = $row->nosa;
          
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
          


              $asede .= "    <tr>
      <th scope='row'>$aidi</th>
      <td>$jenis</td>
      <td>$tanggal</td>
      <td>$no</td>
      <td>$alamat</td>
      <td>$nosa</td>
      <td><a href='/user/handlepengaduandelete/$aidi'><button class='btn btn-danger'>Hapus</button></a><a href='/user/pengaduanprint/$aidi' ><button class='btn btn-primary'>PDF</button></a></td>
    </tr>
";
        }

        return $asede;
      }
      
      public function homeWidget($id){
          if ($id == 1) {
              $sql = "SELECT id FROM `pengaduan` WHERE `jenis` = 1";
          } else if ($id == 2) {
$sql = "SELECT id FROM `pengaduan` WHERE `jenis` = 2";
          } else if ($id == 3) {
$sql = "SELECT id FROM `pengaduan` WHERE `jenis` = 3";
          } else if ($id == 4) {
$sql = "SELECT id FROM `pengaduan` WHERE `jenis` = 4";
          } else if ($id == 5) {
$sql = "SELECT id FROM `pengaduan` WHERE `jenis` = 5";
          } else if ($id == 6) {
$sql = "SELECT id FROM `sambungan`";
          } else if ($id == 7) {
$sql = "SELECT id FROM `user`";
          } else {
              return 69;
          }
          
$query = $this->db->query($sql);

return $query->num_rows();
      }

public function handlePengaduanAdd(){
    $tanggal = $this->db->escape_str($_POST['tanggal']);
        $jenis = $this->db->escape_str($_POST['jenis']);
        $nama = $this->db->escape_str($_POST['nama']);
        $alamat = $this->db->escape_str($_POST['alamat']);
        $nosa = $this->db->escape_str($_POST['nosa']);

        
        if ( ! $this->db->simple_query("INSERT INTO `pengaduan` (`id`, `waktu`, `tanggal`, `jenis`, `nama`, `alamat`, `nosa`) VALUES (NULL, current_timestamp(), '$tanggal', '$jenis', '$nama', '$alamat', '$nosa')"))
          {
        die("Terjadi kesalahan " .  $this->db->error()['message']); // Has keys 'code' and 'message'
        } else {
        header("Location: /user/pengaduan/");
        die("sukses");
        }
}

public function handlePengaduanDelete($id) {
        $id = $this->db->escape_str($id);

        //
        if ( ! $this->db->simple_query("DELETE FROM `pengaduan` WHERE `id` = '$id'"))
          {
        die("Terjadi kesalahan " .  $this->db->error()['message']); // Has keys 'code' and 'message'
        } else {
        header("Location: /user/pengaduan/");
        die("sukses");
        }
      }

public function getPengaduanInfo($id,$type) {
      $id = $this->db->escape_str($id);
      $query = $this->db->query("SELECT * FROM `pengaduan` WHERE `id` = '$id'");

       $row = $query->row();

       if (isset($row))
       {
             if ($type == 1) {
               return $row->id;
             } else if ($type == 2) {
               return $row->tanggal;
             } else if ($type == 3) {
               return $row->nama;
             } else if ($type == 4) {
               return $row->nosa;
             } else if ($type == 5){
                 return $row->jenis;
       } else if ($type == 6) {
           return $row->alamat;
       
             }else {
               return "Invalid Type";
             }
       } else {
         return "tidak diketahui";
       }
    }


}