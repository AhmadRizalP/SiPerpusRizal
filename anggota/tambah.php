<?php
$connect = mysqli_connect('localhost','root','','uklperpus');
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
            
    $query = mysqli_query($connect,"INSERT INTO anggota VALUES ('','$nama','$kelas','$telp','$username','$password','$level')");
    if($query>0){
        echo 
        "
        <script>
        alert('BERHASIL MENAMBAHKAN');
        document.location.href='http://localhost/siperpus/anggota/index.php';
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Data Anggota</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
        <center>
    <?php
    include'../aset/header.php';
    ?>
    <br>
<div class="kotak_tambah">
        <img src="foto/avatar.png"alt="">
        <h3>Tambah Data Anggota</h3>
        <br>
        <form method="post">
        <table class="tabel_tambah" width="" border="0" style="border-collapse: collapse">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="kelas"></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="telp"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="password"></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>:</td>
                <td>
                <select name="level" id="" class="form-control">
                        <option value="">Pilih Level</option>
                    <?php
                    $queryl = mysqli_query($connect,"SELECT * FROM level1");

                    while  ($scan = mysqli_fetch_assoc($queryl)): ?>
                        <option value="<?php echo $scan['id_level'];?>"><?php echo $scan['level'];?></option>
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