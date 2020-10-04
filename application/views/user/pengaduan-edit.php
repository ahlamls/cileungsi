
<?php
$s1 = $s2 = $s3 = $s4 = $s5 = $s6= "";
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
} else if ($jenis == 6) {
    $s6 = "selected";

} else {
    
}
?>
<div class="container">
<h1>Ubah Pengaduan #<?= $id ?></h1>
<hr>
<form action="/user/handlePengaduanEdit/<?= $id ?>" method="POST">
    
<div class="form-group">
    <label for="jenis">Jenis Pengaduan</label>
    <select class="form-control" id="jenis" required="" onchange="handleDiameter()" name="jenis">
      <option <?= $s1?> value="1">Air Mati</option>
      <option <?= $s2?>  value="2">Air Keruh</option>
      <option <?= $s3?>   value="3">Bocor</option>
      <option <?= $s4?>  value="4">Pemakaian Besar</option>
            <option <?= $s6?>  value="6">Pipa Bocor</option>
      <option <?= $s5?>  value="5">Lainnya</option>
    </select>
  </div>
  
<div class="form-group" id="diameterform" >
    <label for="diameter">Diameter Pipa Bocor (Dalam Inch)</label>
    <select class="form-control" id="diameter" required="" value="<?= $diameter ?>" name="diameter">
      <option value="50">50"</option>
      <option value="100">100"</option>
      <option   value="150">150"</option>
      <option value="200">200"</option>
      <option  value="250">250"</option>
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

<script>
window.onload = function(){handleDiameter()};
    
    function handleDiameter() {
    //    alert(document.getElementById("jenis").value);
        if (parseInt(document.getElementById("jenis").value) !== 6) {
            document.getElementById("diameterform").style.display = "none";
            document.getElementById("diameter").required = false;
        } else {
            document.getElementById("diameterform").style.display = "block";
            document.getElementById("diameter").required = true;
        }
    }
</script>
</div>