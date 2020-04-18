
<?php
$connect = mysqli_connect('localhost','root','','uklperpus');

$query = mysqli_query($connect,"SELECT * FROM peminjaman INNER JOIN anggota
ON peminjaman.id_anggota = anggota.id_anggota
INNER JOIN petugas 
ON peminjaman.id_petugas = petugas.id_petugas
INNER JOIN detail_pinjam 
ON peminjaman.id_pinjam = detail_pinjam.id_pinjam
ORDER BY peminjaman.tgl_pinjam");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css" type="text/css">
        
    <title>Transaksi</title>
</head>
<body>
    <center>
<?php
    include'../aset/header.php';
    ?>
     <br>
        <br>
        <br>
        
        <div class="hal_table">
        
        <p> <i class="fad fa-server"></i> Data Peminjaman 
        <a href="form-pinjam.php"><i class="fas fa-plus"></i></a> </p> 

        <div class="back">
            <br>
            <table class="tabel" style="border-collapse: collapse"  >
            <tr id="tr1" style="text-align: center">
                <th>#</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Jatuh Tempo</th>
                <th>Petugas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php $no=1; ?>
            <?php while($p = mysqli_fetch_assoc($query)): ?>
                 <tr style="text-align: center" id="tr2">
                <th scope="row"><?= $no ?></th>;
                <td><?= $p['nama'] ?></th>
                <td><?= date('d F Y', strtotime($p['tgl_pinjam'])) ?></th>
                <td><?= date('d F Y', strtotime($p['tgl_jatuh_tempo'])) ?></th>
                <td><?= $p['nama_petugas'] ?></th>
                <td>
                    <?php 
                    if($p['statusa']=="Dipinjam"){
                        echo'<span class="badge badge-info">Dipinjam</span>';
                    }
                    else {
                        echo'<span class="badge badge-secondary">Kembali</span>';
                    }
                    ?>
                </td>
                <td>
                    <a class="badge badge-success" href="detail.php?id_pinjam=<?= $p['id_pinjam'] ?>&nama=<?= $p['nama'] ?>">Detail</a>
                    <a class="badge badge-warning" href="edit.php?id_pinjam=<?= $p['id_pinjam']?>">Edit</a>
                    <a class="badge badge-danger" href="hapus.php?id_pinjam=<?= $p['id_pinjam'] ?>">Hapus</a>
                </td>
            </tr>
            <?php $no++; ?>
                <?php endwhile; ?>
        </table>
        <br>
        </div>
        </div>
        </center>
</body>
</html>