<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.0.1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
  <title>DagsapArchive - Login</title>


  <!-- Bootstrap core CSS -->
  <link href="assets/css/dashboard.css" rel="stylesheet">

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
  <link href="assets/css/floating-labels.css" rel="stylesheet">
</head>

<body>
  <form class="form-signin" method="post" action="cek_login.php">
    <div class="text-center mb-4">
      <img class="mb-4" src="./assets/logo.png" width="150">
      <h1 class="h3 mb-3 font-weight-normal">PT. Dagsap Endura Eatore</h1>
      <p>Silahkan masukkan username dan password anda, sebelum masuk ke dalam sistem pengarsipan surat</p>
    </div>

    <div class="form-label-group">
      <input type="text" id="username" name="username" class="form-control" required autofocus>
      <label for="username">Username</label>
    </div>

    <div class="form-label-group">
      <input type="password" id="password" name="password" class="form-control" required>
      <label for="password">Password</label>
    </div>
    <button class="btn btn-lg btn-danger btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy; <?= date('Y') ?> by Maria Qibtia 18.230"</p>
  </form>
</body>

</html>