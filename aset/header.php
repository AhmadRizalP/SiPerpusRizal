<?php
session_start();

if(!(isset($_SESSION['id_petugas']))){
  header("Location: http://localhost/siperpus/login/index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://localhost/siperpus/style.css" type="text/css">
        <link rel="stylesheet" href="http://localhost/siperpus/aset/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/siperpus/aset/fontawesome/css/all.css">
        <link rel="stylesheet" href="http://localhost/siperpus/aset/fontawesome/css/all.min.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet"> 
      </head>
    <body>
    <nav class="navbar navbar-expand-lg ">

<a class="navbar-brand" href="#"><img src="foto/logo_hitam.png" alt="" width="160" height="40"></a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span><i class="fad fa-tasks-alt"></i></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">

  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="http://localhost/siperpus/index.php">DASHBOARD</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://localhost/siperpus/buku/index.php">BUKU</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://localhost/siperpus/anggota/index.php">ANGGOTA</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://localhost/siperpus/transaksi/index.php">PEMINJAMAN</a>
    </li>
  </ul>

  <a href="http://localhost/siperpus/login/logout.php" class="logout">  LOGOUT</a>
</div>

</nav>
         

            <script src="http://localhost/siperpus/aset/jquery.js"></script>
            <script src="http://localhost/siperpus/aset/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>