<?php
$connect = mysqli_connect('localhost','root','','uklperpus');
$id = $_GET['id_buku'];

$query = mysqli_query($connect,"DELETE FROM buku WHERE id_buku = $id");

if ($query > 0){

    echo 
    "
        <script>
        alert('Data Berhasil Dihapus');
        document.location.href='http://localhost/siperpus/buku/index.php';
        </script>
        ";
}
?>