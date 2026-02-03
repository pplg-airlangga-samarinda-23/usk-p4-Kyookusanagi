<?php
session_start();
if($_SESSION['role']!='admin'){ header("Location: ../index.php"); }
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota - Sistem Perpustakaan</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Anggota</h2>
        <form method="post">
            <label for="username">Username</label>
            <input id="username" name="username" value="<?php echo $u['username']; ?>" required>

            <label for="role">Role</label>
            <select name="role" id="role">
                <option value="admin" <?php if($u['role']=='admin') echo 'selected'; ?>>Admin</option>
                <option value="anggota" <?php if($u['role']=='anggota') echo 'selected'; ?>>Anggota</option>
            </select>

            <button name="update">Update</button>
        </form>
        <a href="index.php">Kembali</a>
    </div>
</body>
</html>
