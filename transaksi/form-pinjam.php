<?php
session_start();
$connect = mysqli_connect('localhost','root','','uklperpus');
include'fungsi-transaksi.php';

if (isset($_POST['submit'])){
    $idanggota = $_POST['id_anggota'];
    $idbuku = $_POST['id_buku'];
    $tglpinjam = $_POST['tgl_pinjam'];
    $tgljatuh = date('Y-m-d',strtotime("+7 day",strtotime(date($tglpinjam))));

    $nul = NULL;

    $querystok = mysqli_query($connect,"SELECT stok FROM buku WHERE id_buku = $idbuku");
    $hasilstok = mysqli_fetch_assoc($querystok);
    $stok = $hasilstok ['stok'];

    $updatestok = $stok - 1;

    $querya = mysqli_query($connect,"SELECT * FROM peminjaman WHERE id_anggota = $idanggota");
    $hasila = mysqli_fetch_assoc($querya);
    if($hasila ['id_anggota'] == $idanggota){
        $idp = $hasila ['id_pinjam'];

        $querys = mysqli_query($connect,"SELECT statusa FROM detail_pinjam WHERE id_pinjam = $idp");
        $hasils = mysqli_fetch_assoc($querys);

        if($hasils ['statusa'] == "Dipinjam"){
            echo
            "
            <script>
            alert('Anda Belum Mengembalikan Buku Sebelumnya');
            document.location.href='http://localhost/siperpus/transaksi/index.php';
            </script>
            ";
        } else {
            $queryh = mysqli_query($connect,"UPDATE peminjaman SET tgl_pinjam='$tgljatuh',tgl_jatuh_tempo='$tgljatuh' WHERE id_anggota = $idanggota");

            $hapus = mysqli_query($connect,"DELETE FROM detail_pinjam WHERE id_pinjam = $idp");

            if($hapus > 0){
                $req = mysqli_query($connect,"INSERT INTO detail_pinjam VALUES ('','$idp','$idbuku',NULL,'dipinjam','')");

                if ($req > 0) {
                    $queryb = mysqli_query($connect,"UPDATE buku SET stok='$updatestok' WHERE id_buku=$idbuku");

                    if($queryb > 0){
                    echo 
                    "
                    <script>
                    alert('BERHASIL MENAMBAHKAN');
                    document.location.href='http://localhost/siperpus/transaksi/index.php';
                    </script>
                    ";
                    }
                }
            }
        }
    }else {
        $query = mysqli_query($connect,"INSERT INTO peminjaman VALUES ('','$idanggota','$tglpinjam','$tgljatuh','1')");

        if ($query > 0) {
            $queryid = mysqli_query($connect,"SELECT id_pinjam FROM peminjaman WHERE id_anggota = $idanggota");
            $hasil = mysqli_fetch_assoc($queryid);
            $idpinjam = $hasil ['id_pinjam'];
    
            $req = mysqli_query($connect,"INSERT INTO detail_pinjam VALUES ('','$idpinjam','$idbuku',NULL,'dipinjam','')");
    
            if ($req > 0) {
                $queryb = mysqli_query($connect,"UPDATE buku SET stok='$updatestok' WHERE id_buku=$idbuku");

                if($queryb > 0){
                    echo 
                    "
                    <script>
                    alert('BERHASIL MENAMBAHKAN');
                    document.location.href='http://localhost/siperpus/transaksi/index.php';
                    </script>
                    ";
                }
            }
        }
    }

   
}

$buku = ambilBuku($connect);
$anggota = ambilAnggota($connect);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Transaksi</title>
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
        <table class="tabel_tambah"  width="" border="0" style="border-collapse: collapse">
            <tr>
                <td>Nama Anggota</td>
                <td>:</td>
                <td>
                <select name="id_anggota" id="" class="form-control">
                        <option value="">- Pilih Nama</option>
                    <?php
                    foreach ($anggota as $a) { ?>                      
                    <option value="<?= $a['id_anggota']?>"><?= $a['nama']?></option>
                    <?php }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Judul Buku</td>
                <td>:</td>
                <td>
                <select name="id_buku" id="" class="form-control">
                        <option value="">- Pilih Buku</option>
                    <?php
                    foreach ($buku as $b) { ?>                      
                    <option value="<?= $b['id_buku']?>"><?= $b['judul']?></option>
                    <?php }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td>:</td>
                <td><input type="date" class="form-control" name="tgl_pinjam" value="<?php echo date("Y-m-d")?>"></td>
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
