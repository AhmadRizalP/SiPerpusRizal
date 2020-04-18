<?php
$connect = mysqli_connect('localhost','root','','uklperpus');
include'fungsi-transaksi.php';
$id_pinjam = $_GET['id_pinjam'];
$id_buku = $_GET['id_buku'];

$query = mysqli_query($connect,"SELECT * FROM buku WHERE id_buku = $id_buku");
$scan = mysqli_fetch_assoc($query);

if(isset($_POST['submit'])){
    $tglkembali = $_POST['tgl_kembali'];
    $idpinjam = $_POST['idpinjam'];
    $idbuku = $_POST['idbuku'];

    $querya = mysqli_query($connect,"UPDATE detail_pinjam SET tgl_kembali='$tglkembali',statusa='Kembali' WHERE id_pinjam = $idpinjam");

    $stok = $scan['stok'];
    $updateStok = $stok + 1;

    if($querya > 0) {
        $queryb = mysqli_query($connect,"UPDATE buku SET stok = '$updateStok' WHERE id_buku = $idbuku");

        $denda = hitungDenda($connect,$idpinjam,$tglkembali);

        $queryc = mysqli_query($connect,"UPDATE detail_pinjam SET dendaa = '$denda' WHERE id_pinjam = $idpinjam");
        
        if($queryc > 0){
            echo
            "
            <script>
            alert('Buku Berhasil Dikembalikan');
            document.location.href='http://localhost/siperpus/transaksi/detail.php?id_pinjam=$idpinjam';
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
    <title>Form Pengembalian</title>
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
        <h3>Form Pengembalian</h3>
        <form method="post">
        <table class="tabel"  width="" border="0" style="border-collapse: collapse">
           <tr>
                <div class="form-group">
                <td>
                Judul
                </td>
                <td>
                <input class="form-control" type="text" disabled value="<?= $scan['judul'] ?>">
                </td>
                </div>     
           </tr>
           <tr>
                <div class="form-group">
                <td>
                Tanggal Kembali
                </td>
                <td>
                <input class="form-control" type="date" name="tgl_kembali" value="<?php echo date("Y-m-d")?>">
                </td>
                </div>     
           </tr>
           <tr>
                <td colspan="2" style="text-align: center">
                    <button class="btn btn-info" type="submit" name="submit">Kembalikan Buku</button>
                </td>
            </tr>
            <input type="hidden" name="idpinjam" value="<?= $id_pinjam?>" >
            <input type="hidden" name="idbuku" value="<?= $id_buku?>" >

        </table>
        </form>
        </div>
</center>
</body>
</html>