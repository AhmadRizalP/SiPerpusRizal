
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/d0097185b0.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>
<body>
    <center>
    <?php
include'aset/header.php';
?>
        <br>
    <div class="dashboard">
        <div class="judul">
            <h1><i class="fad fa-chart-line"></i> Dashboard</h1>
        </div>
        <div class="isi">
            <div class="jbuku" id="judul">
               <h5 style="padding: 13px 30px">Jumlah Buku </h5>
                <h1 style="padding: 5px 30px">350</h1>
                <br>
              <a style="padding: 10px 30px" href="">Lebih Detail <i class="fas fa-angle-double-right"></i></a>
            </div>
            <div class="janggota">
            <h5 style="padding: 13px 30px">Jumlah Anggota</h5>
                <h1 style="padding: 5px 30px">614</h1>
                <br>
              <a style="padding: 10px 30px" href="">Lebih Detail <i class="fas fa-angle-double-right"></i></a>
            </div>
            <div class="jtransaksi">
            <h5 style="padding: 13px 30px">Jumlah Transaksi</h5>
                <h1 style="padding: 5px 30px">279</h1>
                <br>
              <a style="padding: 5px 30px" href="">Lebih Detail <i class="fas fa-angle-double-right"></i></a>
            </div>
        </div>
    </div>
</body>
</html>