<?php
$connect = mysqli_connect('localhost','root','','uklperpus');
$id = $_GET['id_anggota'];

$query = mysqli_query($connect,"SELECT * FROM anggota WHERE id_anggota = $id");
$anggota = mysqli_fetch_assoc($query);

$idlevel = $anggota['id_level'];

$querylevel = mysqli_query($connect,"SELECT level FROM level1 WHERE id_level = $idlevel");
$level = mysqli_fetch_assoc($querylevel);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<center>
    <?php
    include'../aset/header.php';
    ?>
    <br>
<div class="kotak_tambah">
        <img src="foto/avatar.png"alt="">
        <h3>Detail Data Anggota</h3>
        <br>
        <form method="post">
        <table class="tabel" width="" border="0" style="border-collapse: collapse">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $anggota['nama'];?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><?php echo $anggota['kelas'];?></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>:</td>
                <td><?php echo $anggota['telp'];?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><?php echo $anggota['username'];?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><?php echo $anggota['password'];?></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>:</td>
                <td><?php echo $level['level'];?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center">
                    <a class="badge badge-warning" href="edit.php?id_anggota=<?php echo $anggota['id_anggota']?>">Edit</a>
                    <a class="badge badge-danger" href="hapus.php?id_anggota=<?php echo $anggota['id_anggota']?>">Hapus</a>
                </td>
            </tr>
        </table>
        </div>
</center>
</body>
</html>