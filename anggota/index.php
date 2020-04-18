<?php
$connect = mysqli_connect('localhost','root','','uklperpus');
$query = mysqli_query($connect,"SELECT * FROM anggota ORDER BY nama");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PERPUSTAKAAN</title>
        
        
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
        <i class="fad fa-address-card"></i> Data Anggota
        <a href="http://localhost/siperpus/anggota/tambah.php"><i class="fas fa-plus"></i></a> 
    </p> 
        <div class="back">
            <br>
        <table class="tabel" style="border-collapse: collapse">
            <tr id="tr1" style="text-align: center">
                <th>#</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
            <?php $i=1;?>
             <?php while($siswa = mysqli_fetch_assoc($query)): ?>
            <tr style="text-align: center" id="tr2">
                <td><b><?php echo $i?></b></td>
                <td><?php echo $siswa['nama']?></td>
                <td><?php echo $siswa['kelas']?></td>
                <td>
                <a class="badge badge-success" href="detail.php?id_anggota=<?php echo $siswa['id_anggota']?>">Detail</a>
                    <a class="badge badge-warning" href="edit.php?id_anggota=<?php echo $siswa['id_anggota']?>">Edit</a>
                    <a class="badge badge-danger" href="hapus.php?id_anggota=<?php echo $siswa['id_anggota']?>">Hapus</a>
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