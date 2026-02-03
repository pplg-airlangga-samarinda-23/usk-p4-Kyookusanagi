<?php
session_start();
include 'koneksi.php';

$message = "";
$message_type = "";

if(isset($_POST['daftar'])){
    $u = $_POST['username'];
    $p = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $r = $_POST['role'];

    // Cek apakah username sudah ada
    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$u'");
    if(mysqli_num_rows($cek) > 0){
        $message = "Username sudah ada. Silakan pilih username lain.";
        $message_type = "error";
    } else {
        mysqli_query($koneksi,"INSERT INTO users VALUES(NULL,'$u','$p','$r')");
        $message = "Akun berhasil dibuat! Silakan login.";
        $message_type = "success";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <?php if($message): ?>
            <p class="<?php echo $message_type; ?>"><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="post">
            <label for="username">Username</label>
            <input id="username" name="username" type="text" required>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>

            <label for="role">Role</label>
            <select name="role" id="role">
                <option value="admin">Admin</option>
                <option value="anggota">Anggota</option>
            </select>

            <button name="daftar">Daftar</button>
        </form>
        <p style="text-align: center; margin-top: 20px;">Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</body>
</html>
