<div class="container">
<h1>Tambah Pengaduan Baru</h1>
<hr>
<form action="/user/handlePengaduanAdd" method="POST">
    
<div class="form-group">
    <label for="jenis">Jenis Pengaduan</label>
    <select class="form-control" id="jenis" required="" name="jenis">
      <option value="1">Air Mati</option>
      <option value="2">Air Keruh</option>
      <option value="3">Bocor</option>
      <option value="4">Pemakaian Besar</option>
      <option value="5">Lainnya</option>
    </select>
  </div>
  
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
  <label for="nosa">Nomor SA</label>
  <input type="number" maxlength="20" class="form-control" name="nosa" required="" id="nosa" >
</div>


<hr>
<button class="btn btn-success" type="submit">Tambah</button>
</form>

</div>