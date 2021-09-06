<?php
session_start();
//mengatasi jika user langsung masuk menggunakan link, tanpa login
if (empty($_SESSION['id_user']) or empty($_SESSION['username'])) {
  echo "<script>
      alert('Maaf, untuk mengakses halaman ini, silahkan Login terlebih dahulu..!!');
      document.location='index.php';
      </script>";
}

?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Language" content="en" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

  <link rel="icon" href="./favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
  <!-- Generated: 2018-04-16 09:29:05 +0200 -->
  <title>DagsapArchive</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatables').DataTable();
    });
  </script>
  <!-- Dashboard Core -->
  <link href="./assets/css/dashboard.css" rel="stylesheet" />
  <link href="./assets/dataTables/datatables.min.css" rel="stylesheet" />
  <script src="./assets/js/dashboard.js"></script>
  <script src="./assets/dataTables/datatables.min.js"></script>
</head>

<div class="page">
  <div class="page-main">
    <div class="header py-4">
      <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-3 ml-auto">
              <div class="d-flex order-lg-2 ml-auto">
                <div class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <span class="ml-2 d-none d-lg-block"><span class="text-default">PT. Dagsap Endura Eatore</span>
                    <small class="text-muted d-block mt-1">Administrator</small>
                  </span>
                  <div class="nav nav-tabs border-2 flex-column flex-lg-row ml-3">
                    <a class="btn btn-danger btn-lg" href="logout.php" role="button">Logout</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg order-lg-first">
              <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                <li class="nav-item">
                  <a href="?" class="nav-link"><i class="fe fe-home"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                  <a href="?halaman=departemen" class="nav-link"><i class="fe fe-check-square"></i>Data Departemen</a>
                </li>
                <li class="nav-item">
                  <a href="?halaman=kategori" class="nav-link"><i class="fe fe-check-square"></i>Data Kategori</a>
                </li>
                <li class="nav-item">
                  <a href="?halaman=surat_masuk" class="nav-link"><i class="fe fe-mail"></i>Surat Masuk</a>
                </li>
                <li class="nav-item">
                  <a href="?halaman=surat_keluar" class="nav-link"><i class="fe fe-mail"></i>Surat Keluar</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <body>
      <div class="container">