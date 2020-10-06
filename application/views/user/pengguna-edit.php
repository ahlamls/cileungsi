<div class="container">
<h1>Ubah Pengguna #<?=$id?></h1>
<hr>
<form action="/user/handlePenggunaEdit/<?=$id?>" method="POST">
    


  <div class="form-group">
  <label for="nama">Nama</label>
  <input type="text" class="form-control" name="nama" required="" id="nama" value="<?=$nama?>"  >
</div>

 <div class="form-group">
  <label for="email">Alamat Email</label>
  <input type="email" class="form-control" name="email" required="" id="email" value="<?=$email?>">
</div>

 <div class="form-group">
  <label for="password">Password/Kata Sandi</label>
  <input type="password" class="form-control"  name="password" required="" id="password" >
</div>



<hr>
<button class="btn btn-success" type="submit">Ubah</button>
</form>

</div>