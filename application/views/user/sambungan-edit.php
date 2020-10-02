<div class="container">
<h1>Ubah Sambungan #<?=$id?></h1>
<hr>
<form action="/user/handleSambunganEdit/<?= $id ?>" method="POST">
    
  
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
    <label for="jenis">Jenis Pengaduan</label>
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
<button class="btn btn-success" type="submit">Tambah</button>
</form>

</div>