<?php
$connect = mysqli_connect('localhost','root','','uklperpus');
$id = $_GET['id_anggota'];
$query = mysqli_query($connect,"DELETE FROM anggota WHERE id_anggota=$id");

if($query>0){
    echo 
    "
    <script>
    alert('Data Berhasil DiHapus');
    document.location.href='http://localhost/siperpus/anggota/index.php';
    </script>
    ";
} 
?>