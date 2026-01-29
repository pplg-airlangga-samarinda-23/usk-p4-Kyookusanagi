<?php
include 'koneksi.php';
if(isset($_POST['daftar'])){
    $u = $_POST['username'];
    $p = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $r = $_POST['role'];
    mysqli_query($koneksi,"INSERT INTO users VALUES(NULL,'$u','$p','$r')");
    header("Location: login.php");
}
?>
<form method="post">
Username <input name="username"><br>
Password <input type="password" name="password"><br>
Role
<select name="role">
<option value="admin">Admin</option>
<option value="anggota">Anggota</option>
</select><br>
<button name="daftar">Daftar</button>
</form>
