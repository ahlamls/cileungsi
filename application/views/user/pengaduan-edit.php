
<?php
$s1 = $s2 = $s3 = $s4 = $s5 = "";
if ($jenis == 1) {
    $s1 = "selected";
} else if ($jenis == 2) {
    $s2 = "selected";
} else if ($jenis == 3) {
    $s3 = "selected";
} else if ($jenis == 4) {
    $s4 = "selected";
} else if ($jenis == 5) {
    $s5 = "selected";
} else {
    
}
?>
<div class="container">
<h1>Ubah Pengaduan #<?= $id ?></h1>
<hr>
<form action="/user/handlePengaduanEdit/<?= $id ?>" method="POST">
    
<div class="form-group">
    <label for="jenis">Jenis Pengaduan</label>
    <select class="form-control" id="jenis" required="" name="jenis">
      <option <?= $s1?> value="1">Air Mati</option>
      <option <?= $s2?>  value="2">Air Keruh</option>
      <option <?= $s3?>   value="3">Bocor</option>
      <option <?= $s4?>  value="4">Pemakaian Besar</option>
      <option <?= $s5?>  value="5">Lainnya</option>
    </select>
  </div>
  
  <div class="form-group">
  <label for="tanggal">Tanggal</label>
  <input type="date" class="form-control" name="tanggal"  value="<?= $tanggal?>" required="" id="tanggal" >
</div>

  <div class="form-group">
  <label for="nama">Nama</label>
  <input type="text" class="form-control" name="nama" required="" value="<?= $nama?>" id="nama" >
</div>

 <div class="form-group">
  <label for="alamat">Alamat</label>
  <input type="text" class="form-control" name="alamat" value="<?= $alamat?>" required="" id="alamat" >
</div>

 <div class="form-group">
  <label for="nosa">Nomor SA</label>
  <input type="number" maxlength="8" minlength="8" class="form-control" name="nosa" required="" id="nosa" value="<?=$nosa?>">
</div>


<hr>
<button class="btn btn-success" type="submit">Tambah</button>
</form>

</div>