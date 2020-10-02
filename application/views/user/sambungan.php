<div class="container">
    <h1>Sambungan Baru</h1>
    <a href="/user/sambunganadd"><button class="btn btn-primary">Tambah Sambungan Baru</button></a>
    <hr>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      
      <th scope="col">Tanggal</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
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
<a href="/user/sambunganprintall/"><button class="btn btn-info">PDF Semua Sambungan</button></a>

  
</div>