<div class="container">
<h1>Tambah Sambungan Baru</h1>
<hr>
<form action="/user/handleSambunganAdd" method="POST">
    
  
  <div class="form-group">
  <label for="tanggal">Tanggal</label>
  <input type="date" class="form-control" name="tanggal" required="" id="tanggal" >
</div>

  <div class="form-group">
  <label for="nama">Nama</label>
  <input type="text" class="form-control" name="nama" required="" id="nama" >
</div>

 <div class="form-group">
  <label for="alamat">Alamat</label>
  <input type="text" class="form-control" name="alamat" required="" id="alamat" >
</div>


<div class="form-group">
    <label for="jenis">Jenis Pengaduan</label>
    <select class="form-control" id="jenis" required="" name="jenis">
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