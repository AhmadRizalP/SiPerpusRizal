<?php
$connect = mysqli_connect('localhost','root','','uklperpus');
$idpinjam = $_GET['id_pinjam'];

$query = mysqli_query($connect,"SELECT * FROM peminjaman
INNER JOIN detail_pinjam
ON peminjaman.id_pinjam = detail_pinjam.id_pinjam
INNER JOIN buku
ON buku.id_buku = detail_pinjam.id_buku
WHERE peminjaman.id_pinjam = $idpinjam");

$scan = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pinjam</title>
</head>
<body>
<center>
        <?php
    include'../aset/header.php';
    ?>
    <br>
    <br>
    <br>
<div class="kotak_tambah">
    <img src="foto/transaksi.png" alt="">
        <h3>Tambah Data Transaksi</h3>
        <form method="post">
        <table class="tabel"  width="" border="0" style="border-collapse: collapse">
            <tr>
                <td style="padding: 0 0 0 70px">Judul Buku</td>
                <td style="padding: 0 10px">:</td>
                <td style="width: 47%"><?php echo $scan['judul'] ?></td>
            </tr>
            <tr>
                <td style="padding: 0 0 0 70px">Tanggal Pinjam</td>
                <td style="padding: 0 10px">:</td>
                <td><?php echo $scan['tgl_pinjam'] ?></td>
            </tr>
            <tr>
                <td style="padding: 0 0 0 70px">Tanggal Jatuh Tempo</td>
                <td style="padding: 0 10px">:</td>
                <td><?php echo $scan['tgl_jatuh_tempo'] ?></td>
            </tr>
            <tr>
                <td style="padding: 0 0 0 70px">Tanggal Kembali</td>
                <td style="padding: 0 10px">:</td>
                <td>
                    <?php
                    if($scan['tgl_kembali'] == NULL){
                        echo '-';
                    }else{
                        echo date('d-F-Y',strtotime($scan['tgl_kembali']));
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 0 0 70px">Status</td>
                <td style="padding: 0 10px">:</td>
                <td><?php echo $scan['statusa'] ?></td>
                </tr>
                <?php
                if($scan['dendaa']> 0){?>
                <tr>
                    <td style="padding: 0 0 0 70px">Denda Yang Dibayar</td>
                    <td style="padding: 0 10px">:</td>
                    <td><?php echo $scan['dendaa'] ?></td>
                </tr>
                <?php
                }
                ?>

                <?php if($scan['tgl_kembali'] == NULL) { ?>
                <tr>
                    <td colspan="3" style="text-align: center">
                        <a href="http://localhost/siperpus/transaksi/index.php" class="btn btn-success"><i class="fad fa-angle-double-left"></i> Kembali</a>
                        <a href="form-kembali.php?id_pinjam=<?=$scan['id_pinjam']?>&id_buku=<?= $scan['id_buku']?>" 
                        role="button"
                        class="btn btn-info">
                            Form Pengembalian
                        </a>
                    </td>
                </tr>
                <?php 
                }
                ?>
                 <?php if($scan['tgl_kembali'] != NULL) { ?>
                <tr>
                    <td colspan="3" style="text-align: center">
                        <a href="http://localhost/siperpus/transaksi/index.php" class="btn btn-success"><i class="fad fa-angle-double-left"></i> Kembali</a>
                        <a href="form-kembali.php?id_pinjam=<?=$scan['id_pinjam']?>&id_buku=<?= $scan['id_buku']?>" 
                        role="button"
                        class="btn btn-info disabled">
                            Form Pengembalian
                        </a>
                    </td>
                </tr>
                <?php 
                }
                ?>
        </table>
        </form>
        </div>
</center>
</body>
</html>