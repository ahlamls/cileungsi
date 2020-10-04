<div class="container">
<h1>Tambah Pengaduan Baru</h1>
<hr>
<form action="/user/handlePengaduanAdd" method="POST">
    
<div class="form-group">
    <label for="jenis">Jenis Pengaduan</label>
    <select class="form-control" id="jenis" required="" onchange="handleDiameter()" name="jenis">
      <option value="1">Air Mati</option>
      <option value="2">Air Keruh</option>
      <option value="3">Bocor</option>
      <option value="4">Pemakaian Besar</option>
                  <option value="6">Pipa Bocor</option>
      <option value="5">Lainnya</option>
    </select>
  </div>
  
  <div class="form-group" id="diameterform" >
    <label for="diameter">Diameter Pipa Bocor (Dalam Inch)</label>
    <select class="form-control" id="diameter" required=""  name="diameter">
      <option value="50">50"</option>
      <option value="100">100"</option>
      <option   value="150">150"</option>
      <option value="200">200"</option>
      <option  value="250">250"</option>
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
  <input type="number" maxlength="8" minlength="8" class="form-control" name="nosa" required="" id="nosa" >
</div>


<hr>
<button class="btn btn-success" type="submit">Tambah</button>
</form>
<script>
window.onload = function(){handleDiameter()};
    
    function handleDiameter() {
      //  alert(document.getElementById("jenis").value);
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