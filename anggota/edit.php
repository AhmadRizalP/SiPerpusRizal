<?php
$connect = mysqli_connect('localhost','root','','uklperpus');
$id = $_GET['id_anggota'];
$queryanggota = mysqli_query($connect,"SELECT * FROM anggota WHERE id_anggota=$id");
$scan = mysqli_fetch_assoc($queryanggota);

$idlevel = $scan['id_level'];

$querylevel = mysqli_query($connect,"SELECT level FROM level1 WHERE id_level = $idlevel");
$level = mysqli_fetch_assoc($querylevel);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    
    $query = mysqli_query($connect,"UPDATE anggota SET 
    nama='$nama',kelas='$kelas',telp='$telp',username='$username',
    password='$password',id_level='$level' WHERE id_anggota=$id");

    if($query>0){
        echo 
        "
        <script>
        alert('Data Berhasil DiUbah');
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
        <h3>Edit Data Anggota</h3>
        <br>
        <form method="post">
        <table class="tabel_tambah" width="" border="0" style="border-collapse: collapse">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="nama" value="<?php echo $scan['nama']?>"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="kelas" value="<?php echo $scan['kelas']?>"></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="telp" value="<?php echo $scan['telp']?>"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="username" value="<?php echo $scan['username']?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="password" value="<?php echo $scan['password']?>"></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>:</td>
                <td>
                <select name="level" id="" class="form-control">
                        <option value="<?php echo $scan['id_level'] ?>"><?php echo $level['level']?></option>
                    <?php
                    $queryl = mysqli_query($connect,"SELECT * FROM level1");

                    while  ($scan = mysqli_fetch_assoc($queryl)): ?>
                        <option value="<?php echo $scan['id_level'];?>"><?php echo $scan['level'];?></option>
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