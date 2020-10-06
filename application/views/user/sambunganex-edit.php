<div class="container">
<h1>Ubah Sambungan Lama #<?=$id?></h1>
<hr>
<form action="/user/handleSambunganExEdit/<?= $id ?>" method="POST">
    
  
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
    <label for="persen">Persen</label>
    <select class="form-control" id="persen" required="" name="persen">
      <option value="25">25%</option>
      <option value="50">50%</option>
      <option value="100">100%</option>

    </select>
  </div>

<div class="form-group">
    <label for="jenis">Peruntukan</label>
    <select class="form-control" id="jenis" required="" value="<?= $peruntukan ?>" name="jenis">
      <option value="Rumah Tinggal">Rumah Tinggal</option>
      <option value="Rumah Ibadah">Rumah Ibadah</option>
      <option value="Sosial">Sosial</option>
      <option value="Tempat Usaha">Tempat Usaha</option>
      <option value="Sekolah">Sekolah</option>
      <option value="Lainnya">Lainnya</option>
    </select>
  </div>


<hr>
<button class="btn btn-success" type="submit">Ubah</button>
</form>

</div>
<script>
    
    window.onload = function(){
$("#jenis").val("<?= $peruntukan ?>").change();
$("#persen").val("<?= $persen ?>").change();
        
    };
</script>