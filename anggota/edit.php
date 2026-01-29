<?php
session_start();
if($_SESSION['role']!='admin'){ header("Location: ../login.php"); }
include '../koneksi.php';

$id = $_GET['id'];
$u = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM users WHERE id=$id"));

if(isset($_POST['update'])){
    mysqli_query($koneksi,"UPDATE users SET
        username='$_POST[username]',
        role='$_POST[role]'
        WHERE id=$id
    ");
    header("Location: index.php");
}
?>
<h2>Edit Anggota</h2>

<form method="post">
Username <input name="username" value="<?= $u['username'] ?>"><br>
Role
<select name="role">
    <option value="admin">Admin</option>
    <option value="anggota">Anggota</option>
</select><br>
<button name="update">Update</button>
</form>
