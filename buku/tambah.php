<?php
$connect = mysqli_connect('localhost','root','','uklperpus');
if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $ringkasan = $_POST['ringkasan'];
    $cover = $_POST['cover'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];
            
    $query = mysqli_query($connect,"INSERT INTO buku VALUES ('','$judul','$penerbit','$pengarang','$ringkasan','$cover','$stok','$kategori')");
    if($query>0){
        echo 
        "
        <script>
        alert('BERHASIL MENAMBAHKAN');
        document.location.href='http://localhost/siperpus/buku/index.php';
        </script>
        ";
    } 
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Data Buku</title>
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
        <h3>Tambah Data Buku</h3>
        <form method="post">
        <table class="tabel_tambah"  width="" border="0" style="border-collapse: collapse">
            <tr>
                <td>Judul</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="judul"></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="penerbit"></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="pengarang"></td>
            </tr>
            <tr>
                <td>Ringkasan</td>
                <td>:</td>
                <td>
                    <textarea class="form-control" name="ringkasan" id="" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>Cover</td>
                <td>:</td>
                <td><input class="form-control" type="file" name="cover"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input class="form-control"  type="number" name="stok"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>:</td>
                <td>
                <select name="kategori" id="" class="form-control">
                        <option value="">Pilih Level</option>
                    <?php
                    $queryl = mysqli_query($connect,"SELECT * FROM kategori");

                    while  ($scan = mysqli_fetch_assoc($queryl)): ?>
                        <option value="<?php echo $scan['id_kategori'];?>"><?php echo $scan['kategori'];?></option>
                    <?php endwhile; ?>
                </select>
                </td>
            </tr>
            <tr>
               
                <td colspan="3"><input class="submit" type="submit" value="Tambah Data" name="submit" class="tombol_tambah"></td>
            </tr>
        </table>
        </form>
        </div>
</center>
    </body>
</html>