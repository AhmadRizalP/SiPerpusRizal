<?php
$connect = mysqli_connect('localhost','root','','uklperpus');
$query = mysqli_query($connect,"SELECT * FROM buku ORDER BY judul ");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PERPUSTAKAAN</title>
        <link rel="stylesheet" href="../style.css" type="text/css">
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

        <p> 
        <i class="fad fa-book"></i> Data Buku 
        <a href="tambah.php"><i class="fas fa-plus"></i></a> 
    </p> 
    
        <div class="back">
            <br>
        <table class="tabel" style="border-collapse: collapse" >
            <tr id="tr1" style="text-align: center">
                <th>#</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php $i=1;?>
             <?php while($siswa = mysqli_fetch_assoc($query)): ?>
            <tr style="text-align: center" id="tr2">
                <td><b><?php echo $i?></b></td>
                <td><?php echo $siswa['judul']?></td>
                <td><?php echo $siswa['pengarang']?></td>
                <td><?php echo $siswa['stok']?></td>
                <td>
                    <a class="badge badge-success" href="detail.php?id_buku=<?php echo $siswa['id_buku']?>">Detail</a>
                    <a class="badge badge-warning" href="edit.php?id_buku=<?php echo $siswa['id_buku']?>">Edit</a>
                    <a class="badge badge-danger" href="hapus.php?id_buku=<?php echo $siswa['id_buku']?>">Hapus</a>
                </td>
            </tr>
            <?php $i ++; ?>
             <?php endwhile; ?>
        </table>
        <br>
        </div>
        </div>
    </center>
    </body>
</html>