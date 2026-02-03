<?php
session_start();
include 'koneksi.php';

if(isset($_SESSION['role'])){
    if($_SESSION['role']=="admin"){
        header("Location: dashboard_admin.php");
        exit;
    } else {
        header("Location: dashboard_anggota.php");
        exit;
    }
}

if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = $_POST['password'];

    $q = mysqli_query($koneksi,"SELECT * FROM users WHERE username='$u'");
    $d = mysqli_fetch_assoc($q);

    if($d && password_verify($p,$d['password'])){
        $_SESSION['id']=$d['id'];
        $_SESSION['role']=$d['role'];
        header("Location: dashboard_".$d['role'].".php");
    } else {
        $error = "Login gagal";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php
        if(isset($_SESSION['success'])){
            echo "<p class='success'>".$_SESSION['success']."</p>";
            unset($_SESSION['success']);
        }
        if(isset($error)) echo "<p class='error'>$error</p>";
        ?>
        <form method="post">
            <label for="username">Username</label>
            <input id="username" name="username" type="text" required>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>

            <button name="login">Login</button>
        </form>
        <p style="text-align: center; margin-top: 20px;">Belum punya akun? <a href="register.php">Register di sini</a></p>
        <p style="text-align: center; margin-top: 10px;"><a href="index.php">Kembali ke Beranda</a></p>
    </div>
</body>
</html>
