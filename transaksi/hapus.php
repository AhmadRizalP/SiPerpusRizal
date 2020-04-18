<?php
$connect = mysqli_connect('localhost','root','','uklperpus');
$idpinjam = $_GET['id_pinjam'];

$querya = mysqli_query($connect,"DELETE FROM detail_pinjam WHERE id_pinjam=$idpinjam");
if($querya > 0) {
    $queryb = mysqli_query($connect,"DELETE FROM peminjaman WHERE id_pinjam=$idpinjam");

    if($queryb > 0) {
        echo
        "
        <script>
        alert('Data Berhasil Dihapus');
        document.location.href='http://localhost/siperpus/transaksi/index.php';
        </script>
        ";
    }
}
?>