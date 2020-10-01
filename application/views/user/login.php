<html lang="en"><link type="text/css" id="dark-mode" rel="stylesheet" href=""><style type="text/css" id="dark-mode-custom-style"></style><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="robots" content="noindex nofollow" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Cileungsi Login</title>


    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet">




    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.5/examples/floating-labels/floating-labels.css" rel="stylesheet">
  </head>
  <body>
    <form class="form-signin" method="POST" action="/user/handleLogin">
  <div class="text-center mb-4">
      <img src="/logo.png" width="200px">
    <h1 class="h3 mb-3 font-weight-normal">Program Pelanggan Cabang Cileungsi </h1>
    <p>Silahkan Masuk untuk melanjutkan</p>
  </div>

  <div class="form-label-group">
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Alamat Email" required="" autofocus="">
    <label for="inputEmail">Alamat Email</label>
  </div>

  <div class="form-label-group">
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Kata Sandi" required="">
    <label for="inputPassword">Kata Sandi</label>
  </div>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
  <p class="mt-5 mb-3 text-muted text-center">© 2020 PDAM KABUPATEN BOGOR</p>
</form>


</body></html>