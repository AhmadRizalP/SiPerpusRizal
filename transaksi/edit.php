<?php
$connect = mysqli_connect('localhost','root','','uklperpus');
include'fungsi-transaksi.php';
$id_pinjam = $_GET['id_pinjam'];

$query = mysqli_query($connect,"SELECT * FROM peminjaman INNER JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota 
INNER JOIN detail_pinjam ON peminjaman.id_pinjam = detail_pinjam.id_pinjam 
INNER JOIN buku ON detail_pinjam.id_buku = buku.id_buku
WHERE peminjaman.id_pinjam=$id_pinjam");
$hasil = mysqli_fetch_assoc($query);

$idbuku = $hasil['id_buku'];
$stok = $hasil['stok'];

$hasilstok = $stok - 1;

if(isset($_POST['submit'])){
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgljatuh = date('Y-m-d',strtotime("+7 day",strtotime(date($tgl_pinjam))));
    $tglkembali = $_POST['tgl_kembali'];

    if($tglkembali > 0) {
        $query = mysqli_query($connect,"UPDATE peminjaman SET tgl_pinjam='$tgl_pinjam', tgl_jatuh_tempo='$tgljatuh' WHERE id_pinjam=$id_pinjam");
        $querys = mysqli_query($connect,"UPDATE buku SET stok='$hasilstok' WHERE id_buku=$idbuku");
        $query1 = mysqli_query($connect,"UPDATE detail_pinjam SET tgl_kembali=NULL , statusa='Dipinjam'  WHERE id_pinjam = $id_pinjam");

        if($query1 > 0){
            echo
            "
            <script>
            alert('Data Berhasil Di Update');
            document.location.href='http://localhost/siperpus/transaksi/index.php';
            </script>
            ";
        }
    }else{
        $query2 = mysqli_query($connect,"UPDATE peminjaman SET tgl_pinjam='$tgl_pinjam', tgl_jatuh_tempo='$tgljatuh' WHERE id_pinjam=$id_pinjam");
        if($query2 > 0){

            echo
            "
            <script>
            alert('Data Berhasil Di Update');
            document.location.href='http://localhost/siperpus/transaksi/index.php';
            </script>
            ";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Peminjaman</title>
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
        <h3>Edit Data Transaksi</h3>
        <form method="post">
        <table class="tabel_tambah"  width="" border="0" style="border-collapse: collapse">
            <tr>
                <td>Nama Anggota</td>
                <td>:</td>
                <td>
                <input type="text" value="<?= $hasil['nama'] ?>" disabled class="form-control">
                </td>
            </tr>
            <tr>
                <td>Judul Buku</td>
                <td>:</td>
                <td>
                <input type="text" value="<?= $hasil['judul'] ?>" disabled class="form-control">
                </td>
            </tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td>:</td>
                <td><input type="date" class="form-control" name="tgl_pinjam" value="<?= $hasil['tgl_pinjam'] ?>"></td>
            </tr>
            <?php
            if($hasil['statusa'] == "Kembali"){
            ?>
            <tr>
                <td>Tanggal Kembali</td>
                <td>:</td>
                <td><input type="date" class="form-control" name="tgl_kembali" value="<?= $hasil['tgl_kembali'] ?>"></td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="3"><input class="submit" type="submit" value="Update Data" name="submit" class="tombol_tambah"></td>
            </tr>
            

        </table>
        </form>
        </div>
</center>
</body>
</html>