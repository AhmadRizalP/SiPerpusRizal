<?php
$connect = mysqli_connect('localhost','root','','uklperpus');

session_start();

if(isset($_POST['btnlogin'])){
$username = mysqli_real_escape_string($connect, $_POST ['username']);
$password = mysqli_real_escape_string($connect, $_POST ['password']);

$sql = mysqli_query($connect, "SELECT * FROM petugas WHERE username='$username' && password='$password'");

$data = mysqli_fetch_array($sql);

if (! empty($data)){
    $_SESSION ['username'] = $data['username'];
    
    $_SESSION['id_petugas'] = $data['id_petugas'];
    setcookie("message","delete",time()-1);
    header("location: http://localhost/siperpus/index.php");
} else {
    setcookie("message","Maaf, Username atau Password salah",time()+3600);
    header("location: http://localhost/siperpus/login/index.php");

}
}