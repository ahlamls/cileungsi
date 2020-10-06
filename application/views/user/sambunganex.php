<div class="container">
    <h1>Sambungan Lama</h1>
    <a href="/user/sambunganexadd"><button class="btn btn-primary">Tambah Sambungan Lama</button></a>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalfilter">
  Filter
</button>
    <hr>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      
      <th scope="col">Tanggal</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
            <th scope="col">Persen</th>
      <th scope="col">Peruntukan</th>
      <th scope="col">Aksi</th>
      
    </tr>
  </thead>
  <tbody>
   <?= $content ?>
    
  </tbody>
</table>

</div>
<hr>
<a href="/user/sambunganexprintall/"><button class="btn btn-info">PDF Semua Sambungan Lama</button></a>

  
</div>

    
<script>
function hapus(id,nama,hapusurl) {
    document.getElementById("hapusname").innerHTML = nama;
    document.getElementById("hapusurl").href = hapusurl;
$('#modal').modal('show');
}
    
</script>

<!-- MODOL -->
<div class="modal fade" id="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah kamu yakin ingin menghapus <b id="hapusname"></b>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a id="hapusurl"><button type="button" class="btn btn-primary">Ya</button></a>
      </div>
    </div>
  </div>
</div>

<!-- pilter -->
<?php

$allyear ="";
$thn = (int) date("Y"); 
for ($x = $thn; $x >= 1970; $x--) {
    
  $allyear .= "<option value='$x'>$x</option>";
}

?>
<script>
window.onload = function() {

    $("#bulan").val("<?= date("m") ?>").change();
    $("#tanggal").val("<?= date("Y-m-d") ?>");
}


var type = 1;
function ct(x){
    type = x;
  // alert(type);
}

function filter() {
    var v1=0;
    var v2=0;
    var j=0;
    if (type== 1) {
        v1 = document.getElementById("tanggal").value;
    } else if (type == 2 ) {
        v2 = document.getElementById("bulan").value;
        v1 = document.getElementById("tahun1").value;
    } else if (type == 3) {
        v1 = document.getElementById("tahun2").value;
    }
    j = document.getElementById("jenis").value;
window.location.href = "?t=" + type + "&v1=" + v1 + "&v2=" + v2 + "&j=" + j;
}
    
</script>
<div class="modal fade" id="modalfilter" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title text-white">Filter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" onclick="ct(1)" aria-controls="pills-home" aria-selected="true">Hari</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" onclick="ct(2)" aria-controls="pills-profile" aria-selected="false">Bulan</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" onclick="ct(3)" aria-controls="pills-contact" aria-selected="false">Tahun</a>
  </li>
</ul>
<hr>

<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      
        <div class="form-group">
  <label for="tanggal">Tanggal</label>
  <input type="date" class="form-control" name="tanggal" required="" id="tanggal" >
</div>



  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
      
<div class="form-group">
    <label for="bulan">Bulan</label>
    <select class="form-control" id="bulan" required="" name="bulan">
      <option value="1">Januari</option>
      <option value="2">Februari</option>
      <option value="3">Maret</option>
      <option value="4">April</option>
      <option value="5">Mei</option>
    <option value="6">Juni</option>
      <option value="7">Juli</option>
      <option value="8">Agustus</option>
      <option value="9">September</option>
    <option value="10">Oktober</option>
      <option value="11">November</option>
            <option value="12">Desember</option>

    </select>
  </div>
  
  <div class="form-group">
    <label for="tahun1">Tahun</label>
    <select class="form-control" id="tahun1" required="" name="tahun1">
   <?= $allyear ?>
    </select>
  </div>
  


    
  
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
      
        <div class="form-group">
    <label for="tahun2">Tahun</label>
    <select class="form-control" id="tahun2" required="" name="tahun2">
   <?= $allyear ?>
    </select>
  </div>
  
      
  </div>
</div>
<div class="form-group">
    <label for="jenis">Peruntukan</label>
    <select class="form-control" id="jenis" required="" name="jenis">
      <option value="Rumah Tinggal">Rumah Tinggal</option>
      <option value="Rumah Ibadah">Rumah Ibadah</option>
      <option value="Sosial">Sosial</option>
      <option value="Tempat Usaha">Tempat Usaha</option>
      <option value="Sekolah">Sekolah</option>
      <option value="Lainnya">Lainnya</option>
    </select>
  </div>



        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" onclick="filter()" class="btn btn-primary">Filter</button>
      </div>
    </div>
  </div>
</div>