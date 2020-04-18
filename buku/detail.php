<?php
$connect = mysqli_connect('localhost','root','','uklperpus');
$id = $_GET['id_buku'];

$query = mysqli_query($connect,"SELECT * FROM buku WHERE id_buku = $id");
$scan = mysqli_fetch_assoc($query);

$idkategori = $scan['id_kategori'];

$querkategori = mysqli_query($connect,"SELECT kategori FROM kategori WHERE id_kategori = $idkategori ");

$scankat = mysqli_fetch_assoc($querkategori);

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
    <br>
    <br>
<div class="kotak_tambah">
    <img src="foto/book.png" alt="">
        <h3>Detail Data Buku</h3>
        <form method="post">
        <table class="tabel"  width="" border="0" style="border-collapse: collapse">
            <tr>
                <td>Cover</td>
                <td style="padding: 0px 5px">:</td>
                <td style="padding: 15px 50px"><img src="cover/<?php echo $scan['cover'] ?>" alt=""></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td style="padding: 0px 5px">:</td>
                <td style="padding: 0px 50px"><?php echo $scan['judul'];?></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td style="padding: 0px 5px">:</td>
                <td style="padding: 0px 50px"><?php echo $scan['penerbit'];?></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td  style="padding: 0px 5px">:</td>
                <td style="padding: 0px 50px"><?php echo $scan['pengarang'];?></td>
            </tr>
            <tr>
                <td>Ringkasan</td>
                <td style="padding: 0px 5px">:</td>
                <td style="padding: 0px 50px"><?php echo $scan['ringkasan'];?></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td style="padding: 0px 5px">:</td>
                <td style="padding: 0px 50px"><?php echo $scan['stok'];?></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td style="padding: 0px 5px">:</td>
                <td style="padding: 0px 50px"><?php echo $scankat['kategori'];?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center" style="align-items: center">
                    <a class="badge badge-warning" href="edit.php?id_buku=<?php echo $scan['id_buku']?>">Edit</a>
                    <a class="badge badge-danger" href="hapus.php?id_buku=<?php echo $scan['id_buku']?>">Hapus</a>
                </td>
            </tr>
        </table>
        </div>
</center>

    
</body>
</html>