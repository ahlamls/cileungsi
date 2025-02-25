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
        header("Location: /user/logout/");
        die("sukses");
         
       }
    }
    
    
public function pengaduanList($t,$v1,$v2,$j) {
        /*
        */
        $t = $this->db->escape_str($t);
        $v1 = $this->db->escape_str($v1);
        $v2 = $this->db->escape_str($v2);
        if ((int)$v2 < 10){
            $v2 = "0" . $v2;
        }
        $j = $this->db->escape_str($j);
        $eq = "";
        if ($t != 0) {
            $eq .= "WHERE ";
        }
        
        if ($t == 1) {
            $eq .= "tanggal = '$v1'";
        } else if ($t == 2) {
            $eq .= "tanggal LIKE '$v1-$v2-%'";
        } else if ($t == 3) {
            $eq .= "tanggal LIKE '$v1-%'";
        }
        
        if ($j != 0) {
            $eq .= " AND jenis = '$j'";
        }
        
        
        $asede = "";
        $query = $this->db->query("SELECT * FROM `pengaduan` $eq ORDER BY `pengaduan`.`id` ASC");

        foreach ($query->result() as $row)
        {
          $aidi = $row->id;
          $jenis = $row->jenis;
          $tanggal = $row->tanggal;
          $no = $row->nama;
          $alamat = $row->alamat;
          $nosa = $row->nosa;
          $diameter = $row->diameter;
          
          if ($jenis == 1) {
              $jenis = "Air Mati";
          } else if ($jenis == 2) {
              $jenis = "Air Keruh";
          } else if ($jenis == 3) {
              $jenis = "Bocor";
          } else if ($jenis == 4) {
              $jenis = "Pemakaian Besar";
          } else if ($jenis == 5) {
              $jenis = "Lainnya";
          } else if ($jenis == 6){
              $jenis = "Pipa Bocor (" . $diameter . '")';
}

              $asede .= "    <tr>
      <th scope='row'>$aidi</th>
      <td>$jenis</td>
      <td>$tanggal</td>
      <td>$no</td>
      <td>$alamat</td>
      <td>$nosa</td>
      <td>
      <button class='btn btn-danger' onclick=" . '"' . "hapus($aidi,'$no','/user/handlepengaduandelete/$aidi')" . '"' .">Hapus</button>
      <a href='/user/pengaduanedit/$aidi'><button class='btn btn-warning text-black'>Edit</button></a>
      <a href='/user/pengaduanprint/$aidi' ><button class='btn btn-primary'>PDF</button></a>
      </td>
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
          } else if ($id == 8) {
              $sql = "SELECT id FROM `sambunganex";
                        } else if ($id == 9) {
$sql = "SELECT id FROM `pengaduan` WHERE `jenis` = 6";
              }else {
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
     $diameter = $this->db->escape_str($_POST['diameter']);

        
        if ( ! $this->db->simple_query("INSERT INTO `pengaduan` (`id`, `waktu`, `tanggal`, `jenis`, `nama`, `alamat`, `nosa`,`diameter`) VALUES (NULL, current_timestamp(), '$tanggal', '$jenis', '$nama', '$alamat', '$nosa','$diameter')"))
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
      
      public function handlePengaduanEdit($id){
        $id = $this->db->escape_str($id);
 $tanggal = $this->db->escape_str($_POST['tanggal']);
        $jenis = $this->db->escape_str($_POST['jenis']);
        $nama = $this->db->escape_str($_POST['nama']);
        $alamat = $this->db->escape_str($_POST['alamat']);
        $nosa = $this->db->escape_str($_POST['nosa']);
     $diameter = $this->db->escape_str($_POST['diameter']);
       
      if ( ! $this->db->simple_query("UPDATE `pengaduan` SET `jenis` = '$jenis', `nama` = '$nama', `alamat` = '$alamat', `tanggal` = '$tanggal' , `nosa` = '$nosa' , `diameter` = '$diameter' WHERE `pengaduan`.`id` = '$id'"))
        {
      die("Terjadi kesalahan " .  $this->db->error()['message']); // Has keys 'code' and 'message'
      } else {
      header("Location: /user/pengaduan");
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
       } else if ($type == 7) {
           return $row->diameter;
       
             }else {
               return "Invalid Type";
             }
       } else {
         return "tidak diketahui";
       }
    }


    
public function sambunganList($t,$v1,$v2,$j) {
        /*
        */
                $t = $this->db->escape_str($t);
        $v1 = $this->db->escape_str($v1);
        $v2 = $this->db->escape_str($v2);
        if ((int)$v2 < 10){
            $v2 = "0" . $v2;
        }
        $j = $this->db->escape_str($j);
        $eq = "";
        if ($t != 0) {
            $eq .= "WHERE ";
        }
        
        if ($t == 1) {
            $eq .= "tanggal = '$v1'";
        } else if ($t == 2) {
            $eq .= "tanggal LIKE '$v1-$v2-%'";
        } else if ($t == 3) {
            $eq .= "tanggal LIKE '$v1-%'";
        }
        
        if ($j != 0) {
            $eq .= " AND peruntukan = '$j'";
        }
        
        $asede = "";
        $query = $this->db->query("SELECT * FROM `sambungan` $eq ORDER BY `sambungan`.`id` ASC");

        foreach ($query->result() as $row)
        {
          $aidi = $row->id;
          $peruntukan = $row->peruntukan;
          $tanggal = $row->tanggal;
          $no = $row->nama;
          $alamat = $row->alamat;

          

          


              $asede .= "    <tr>
      <th scope='row'>$aidi</th>
     
      <td>$tanggal</td>
      <td>$no</td>
      <td>$alamat</td>
      <td>$peruntukan</td>
      <td>
      <button class='btn btn-danger' onclick=" . '"' . "hapus($aidi,'$no','/user/handlesambungandelete/$aidi')" . '"' .">Hapus</button>
      <a href='/user/sambunganedit/$aidi'><button class='btn btn-warning text-black'>Edit</button></a>
      <a href='/user/sambunganprint/$aidi' ><button class='btn btn-primary'>PDF</button></a></td>
    </tr>
";
        }

        return $asede;
      }
      
         

public function handleSambunganAdd(){
    $tanggal = $this->db->escape_str($_POST['tanggal']);
        $peruntukan = $this->db->escape_str($_POST['jenis']);
        $nama = $this->db->escape_str($_POST['nama']);
        $alamat = $this->db->escape_str($_POST['alamat']);


        
        if ( ! $this->db->simple_query("INSERT INTO `sambungan` (`id`, `waktu`, `tanggal`, `nama`, `alamat`, `peruntukan`) VALUES (NULL, current_timestamp(), '$tanggal', '$nama', '$alamat', '$peruntukan');"))
          {
        die("Terjadi kesalahan " .  $this->db->error()['message']); // Has keys 'code' and 'message'
        } else {
        header("Location: /user/sambungan/");
        die("sukses");
        }
}

public function handleSambunganDelete($id) {
        $id = $this->db->escape_str($id);

        //
        if ( ! $this->db->simple_query("DELETE FROM `sambungan` WHERE `id` = '$id'"))
          {
        die("Terjadi kesalahan " .  $this->db->error()['message']); // Has keys 'code' and 'message'
        } else {
        header("Location: /user/sambungan/");
        die("sukses");
        }
      }
      
      public function handleSambunganEdit($id){
        $id = $this->db->escape_str($id);
 $tanggal = $this->db->escape_str($_POST['tanggal']);
        $jenis = $this->db->escape_str($_POST['jenis']);
        $nama = $this->db->escape_str($_POST['nama']);
        $alamat = $this->db->escape_str($_POST['alamat']);
       

       
      if ( ! $this->db->simple_query("UPDATE `sambungan` SET `peruntukan` = '$jenis', `nama` = '$nama', `alamat` = '$alamat', `tanggal` = '$tanggal'  WHERE `sambungan`.`id` = '$id'"))
        {
      die("Terjadi kesalahan " .  $this->db->error()['message']); // Has keys 'code' and 'message'
      } else {
      header("Location: /user/sambungan");
      die("sukses");
      }
      }

public function getSambunganInfo($id,$type) {
      $id = $this->db->escape_str($id);
      $query = $this->db->query("SELECT * FROM `sambungan` WHERE `id` = '$id'");

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
               return $row->peruntukan;
             } else if ($type == 5){
                 return $row->peruntukan;
       } else if ($type == 6) {
           return $row->alamat;
       
             }else {
               return "Invalid Type";
             }
       } else {
         return "tidak diketahui";
       }
    }
    
    public function sambunganprintall(){
   
    

        $asede = "";
        $query = $this->db->query("SELECT * FROM `sambungan` ORDER BY `sambungan`.`id` ASC");

        foreach ($query->result() as $row)
        {

        $aidi = $row->id;
        $tanggal = $row->tanggal;
        $nama=$row->nama;
        $jenis=$row->peruntukan;
        $alamat = $row->alamat;
$asede .= "

<h4><b>Nomor Sambungan Baru #$aidi</b></h4>
<table style='width: 100%; border: solid 1px #FFFFFF;'>
    <tr>
            <td style='width: 50%; border: solid 1px #000000;'>

            
<p>
<b>Tanggal :</b> $tanggal <br>
<b>Nama :</b> $nama<br>
<b>Peruntukan:</b> $jenis<br>
</p>
</td>
    
            <td style='width: 50%; border: solid 1px #000000;'>
      <p> <b>Alamat : </b><br>
      $alamat
      </p></td>
      </tr>
    </table>
<hr>
";
        
        
        
    }
    return $asede;
    }
    
    
public function pengaduanprintall(){
   
    

        $asede = "";
        $query = $this->db->query("SELECT * FROM `pengaduan` ORDER BY `pengaduan`.`id` ASC");

        foreach ($query->result() as $row)
        {

        $aidi = $row->id;
        $tanggal = $row->tanggal;
        $nama=$row->nama;
        $jenis=$row->jenis;
        $alamat = $row->alamat;
        $nosa = $row->nosa;
         $diameter = $row->diameter;
         $diameterx = "";
          if ($jenis == 1) {
              $jenis = "Air Mati";
          } else if ($jenis == 2) {
              $jenis = "Air Keruh";
          } else if ($jenis == 3) {
              $jenis = "Bocor";
          } else if ($jenis == 4) {
              $jenis = "Pemakaian Besar";
          } else if ($jenis == 5) {
              $jenis = "Lainnya";
          } else if ($jenis ==6) {
              $jenis = "Pipa Bocor";
              $diameterx =" <b>Diameter Pipa (inch): </b> $diameter <br>";
          }
          
        
        
$asede .= "

<h4><b>Nomor Pengaduan #$aidi</b></h4>
<table style='width: 100%; border: solid 1px #FFFFFF;'>
    <tr>
            <td style='width: 50%; border: solid 1px #000000;'>

            
<p>
<b>Tanggal :</b> $tanggal <br>
<b>Nama :</b> $nama<br>
<b>Nomor SA :</b> $nosa<br>
<b>Jenis:</b> $jenis<br>
$diameterx
</p>
</td>
    
            <td style='width: 50%; border: solid 1px #000000;'>
      <p> <b>Alamat : </b><br>
      $alamat
      </p></td>
      </tr>
    </table>
<hr>
";
        
        
        
    }
    return $asede;
    }
    
public function penggunaList() {
        /*
        */
        $asede = "";
        $query = $this->db->query("SELECT * FROM `user` ORDER BY `user`.`id` ASC");

        foreach ($query->result() as $row)
        {
          $aidi = $row->id;
          $email = $row->email;
          $nama = $row->name;

          

          


              $asede .= "    <tr>
      <th scope='row'>$aidi</th>
     
      <td>$email</td>
      <td>$nama</td>

      <td>
      <button class='btn btn-danger' onclick=" . '"' . "hapus($aidi,'$nama','/user/handlepenggunadelete/$aidi')" . '"' .">Hapus</button>
      <a href='/user/penggunaedit/$aidi'><button class='btn btn-warning text-black'>Edit</button></a>
      </td>
    </tr>
";
        }

        return $asede;
      }
      
         

public function handlePenggunaAdd(){
    $email = $this->db->escape_str($_POST['email']);
    $nama = $this->db->escape_str($_POST['nama']);
      //  $password= $this->db->escape_str($_POST['password']);
        $password = hash('sha512', $this->db->escape_str($_POST['password']));
        $alamat = $this->db->escape_str($_POST['alamat']);


        
        if ( ! $this->db->simple_query(" INSERT INTO `user` (`id`, `email`, `password`, `name`, `level`) VALUES (NULL, '$email', '$password', '$nama', '1')
 "))
          {
        die("Terjadi kesalahan " .  $this->db->error()['message']); // Has keys 'code' and 'message'
        } else {
        header("Location: /user/pengguna/");
        die("sukses");
        }
}

public function handlePenggunaDelete($id) {
        $id = $this->db->escape_str($id);
       $query = $this->db->query("SELECT * FROM `user` ");
        if ($query->num_rows() == 1) {
            die("[cileungsi] Error : Harus menyisakan minimal 1 user");
        }


        //
        if ( ! $this->db->simple_query("DELETE FROM `user` WHERE `id` = '$id'"))
          {
        die("Terjadi kesalahan " .  $this->db->error()['message']); // Has keys 'code' and 'message'
        } else {
        header("Location: /user/pengguna/");
        die("sukses");
        }
      }
      
      public function handlePenggunaEdit($id){
        $id = $this->db->escape_str($id);
    $email = $this->db->escape_str($_POST['email']);
    $nama = $this->db->escape_str($_POST['nama']);
      //  $password= $this->db->escape_str($_POST['password']);
        $password = hash('sha512', $this->db->escape_str($_POST['password']));
        $alamat = $this->db->escape_str($_POST['alamat']);

       
      if ( ! $this->db->simple_query("UPDATE `user` SET `email` = '$email', `name` = '$nama', `password` = '$password'  WHERE `user`.`id` = '$id'"))
        {
      die("Terjadi kesalahan " .  $this->db->error()['message']); // Has keys 'code' and 'message'
      } else {
      header("Location: /user/pengguna");
      die("sukses");
      }
      }

public function getPenggunaInfo($id,$type) {
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

             } else if ($type == 5){

       } else if ($type == 6) {

       
             }else {
               return "Invalid Type";
             }
       } else {
         return "tidak diketahui";
       }
    }

  
    
public function sambunganexList($t,$v1,$v2,$j) {
        /*
        */
        
                        $t = $this->db->escape_str($t);
        $v1 = $this->db->escape_str($v1);
        $v2 = $this->db->escape_str($v2);
        if ((int)$v2 < 10){
            $v2 = "0" . $v2;
        }
        $j = $this->db->escape_str($j);
        $eq = "";
        if ($t != 0) {
            $eq .= "WHERE ";
        }
        
        if ($t == 1) {
            $eq .= "tanggal = '$v1'";
        } else if ($t == 2) {
            $eq .= "tanggal LIKE '$v1-$v2-%'";
        } else if ($t == 3) {
            $eq .= "tanggal LIKE '$v1-%'";
        }
        
        if ($j != 0) {
            $eq .= " AND peruntukan = '$j'";
        }
        
        $asede = "";
        $query = $this->db->query("SELECT * FROM `sambunganex` $eq ORDER BY `sambunganex`.`id` ASC");

        foreach ($query->result() as $row)
        {
          $aidi = $row->id;
          $peruntukan = $row->peruntukan;
          $tanggal = $row->tanggal;
          $no = $row->nama;
          $alamat = $row->alamat;
          $persen = $row->persen;

          

          


              $asede .= "    <tr>
      <th scope='row'>$aidi</th>
     
      <td>$tanggal</td>
      <td>$no</td>
      <td>$alamat</td>
      <td>$persen%</td>
      <td>$peruntukan</td>
      <td>
      <button class='btn btn-danger' onclick=" . '"' . "hapus($aidi,'$no','/user/handlesambunganexdelete/$aidi')" . '"' .">Hapus</button>
      <a href='/user/sambunganexedit/$aidi'><button class='btn btn-warning text-black'>Edit</button></a>
      <a href='/user/sambunganexprint/$aidi' ><button class='btn btn-primary'>PDF</button></a></td>
    </tr>
";
        }

        return $asede;
      }
      
         

public function handleSambunganExAdd(){
    $tanggal = $this->db->escape_str($_POST['tanggal']);
        $peruntukan = $this->db->escape_str($_POST['jenis']);
        $nama = $this->db->escape_str($_POST['nama']);
        $alamat = $this->db->escape_str($_POST['alamat']);
                $persen = $this->db->escape_str($_POST['persen']);
        


        
        if ( ! $this->db->simple_query("INSERT INTO `sambunganex` (`id`, `waktu`, `tanggal`, `nama`, `alamat`, `peruntukan` , `persen`) VALUES (NULL, current_timestamp(), '$tanggal', '$nama', '$alamat', '$peruntukan' ,'$persen');"))
          {
        die("Terjadi kesalahan " .  $this->db->error()['message']); // Has keys 'code' and 'message'
        } else {
        header("Location: /user/sambunganex/");
        die("sukses");
        }
}

public function handleSambunganExDelete($id) {
        $id = $this->db->escape_str($id);

        //
        if ( ! $this->db->simple_query("DELETE FROM `sambunganex` WHERE `id` = '$id'"))
          {
        die("Terjadi kesalahan " .  $this->db->error()['message']); // Has keys 'code' and 'message'
        } else {
        header("Location: /user/sambunganex/");
        die("sukses");
        }
      }
      
      public function handleSambunganExEdit($id){
        $id = $this->db->escape_str($id);
 $tanggal = $this->db->escape_str($_POST['tanggal']);
        $jenis = $this->db->escape_str($_POST['jenis']);
        $nama = $this->db->escape_str($_POST['nama']);
        $alamat = $this->db->escape_str($_POST['alamat']);
                       $persen = $this->db->escape_str($_POST['persen']);

       
      if ( ! $this->db->simple_query("UPDATE `sambunganex` SET `peruntukan` = '$jenis', `nama` = '$nama', `alamat` = '$alamat', `tanggal` = '$tanggal' , `persen` = '$persen' WHERE `sambunganex`.`id` = '$id'"))
        {
      die("Terjadi kesalahan " .  $this->db->error()['message']); // Has keys 'code' and 'message'
      } else {
      header("Location: /user/sambunganex");
      die("sukses");
      }
      }

public function getSambunganExInfo($id,$type) {
      $id = $this->db->escape_str($id);
      $query = $this->db->query("SELECT * FROM `sambunganex` WHERE `id` = '$id'");

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
               return $row->peruntukan;
             } else if ($type == 5){
                 return $row->persen;
       } else if ($type == 6) {
           return $row->alamat;
       
             }else {
               return "Invalid Type";
             }
       } else {
         return "tidak diketahui";
       }
    }
    
    public function sambunganexprintall(){
   
    

        $asede = "";
        $query = $this->db->query("SELECT * FROM `sambunganex` ORDER BY `sambunganex`.`id` ASC");

        foreach ($query->result() as $row)
        {

        $aidi = $row->id;
        $tanggal = $row->tanggal;
        $nama=$row->nama;
        $jenis=$row->peruntukan;
        $persen = $row->persen;
        $alamat = $row->alamat;
$asede .= "

<h4><b>Nomor Sambungan Lama #$aidi</b></h4>
<table style='width: 100%; border: solid 1px #FFFFFF;'>
    <tr>
            <td style='width: 50%; border: solid 1px #000000;'>

            
<p>
<b>Tanggal :</b> $tanggal <br>
<b>Nama :</b> $nama<br>
<b>Peruntukan:</b> $jenis<br>
<b>Persen : $persen % </b>
</p>
</td>
    
            <td style='width: 50%; border: solid 1px #000000;'>
      <p> <b>Alamat : </b><br>
      $alamat
      </p></td>
      </tr>
    </table>
<hr>
";
        
        
        
    }
    return $asede;
    }
    
    

}