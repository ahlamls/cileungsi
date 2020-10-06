<div class="container">
    <h1>Pengguna</h1>
    <a href="/user/penggunaadd"><button class="btn btn-primary">Tambah Pengguna Baru</button></a>
    <hr>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      
      <th scope="col">Email</th>
      <th scope="col">Nama</th>
      <th scope="col">Aksi</th>
     
      
    </tr>
  </thead>
  <tbody>
   <?= $content ?>
    
  </tbody>
</table>
</div>
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