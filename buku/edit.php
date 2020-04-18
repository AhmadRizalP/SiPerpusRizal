<?php
$connect = mysqli_connect('localhost','root','','uklperpus');
$id = $_GET['id_buku'];
$querdetail = mysqli_query($connect,"SELECT * FROM buku WHERE id_buku = $id");
$scan = mysqli_fetch_assoc($querdetail);

$idkategori = $scan['id_kategori'];

$querkategori = mysqli_query($connect,"SELECT kategori FROM kategori WHERE id_kategori = $idkategori ");

$scankat = mysqli_fetch_assoc($querkategori);

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $ringkasan = $_POST['ringkasan'];
    $cover = $_POST['cover'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];

    $query = mysqli_query($connect,"UPDATE buku SET judul='$judul',penerbit='$penerbit',pengarang='$pengarang',ringkasan='$ringkasan',cover='$cover',stok='$stok',id_kategori='$kategori' WHERE id_buku = $id");
 
    if($query>0){
        echo 
        "
        <script>
        alert('Data Berhasil DiUbah');
        document.location.href='http://localhost/siperpus/buku/index.php';
        </script>
        ";
    } 
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Data Buku</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
        <h3>Edit Data Buku</h3>
        <form method="post">
        <table class="tabel_tambah"  width="" border="0" style="border-collapse: collapse">
            <tr>
                <td>Judul</td>
                <td>:</td>
                <td><input class="form-control"  type="text" name="judul" value="<?php echo $scan['judul']?>"></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:</td>
                <td><input class="form-control"  type="text" name="penerbit" value="<?php echo $scan['penerbit']?>"></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td>:</td>
                <td><input class="form-control"  type="text" name="pengarang" value="<?php echo $scan['pengarang']?>"></td>
            </tr>
            <tr>
                <td>Ringkasan</td>
                <td>:</td>
                <td>
                    <textarea class="form-control" name="ringkasan" value="<?php echo $scan['ringkasan']?>" placeholder="<?php echo $scan['ringkasan']?>"></textarea>
                </td>
            </tr>
            <tr>
                <td>Cover</td>
                <td>:</td>
                <td><input class="form-control"  type="file" name="cover" value="<?php echo $scan['cover']?>"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input class="form-control"  type="number" name="stok" value="<?php echo $scan['stok']?>"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>:</td>
                <td>
                <select name="kategori" id="" class="form-control">
                        <option value="<?php echo $scan['id_kategori']?>"><?php echo $scankat['kategori']?></option>
                    <?php
                    $queryl = mysqli_query($connect,"SELECT * FROM kategori");

                    while  ($scan = mysqli_fetch_assoc($queryl)): ?>
                        <option value="<?php echo $scan['id_kategori'];?>"><?php echo $scan['kategori'];?></option>
                    <?php endwhile; ?>
                </select>
                </td>
            </tr>
            <tr>
               
                <td colspan="3"><input class="submit" type="submit" value="Update Data" name="submit" class="tombol_tambah"></td>
            </tr>
        </table>
        </form>
        </div>
</center>
    </body>
</html>