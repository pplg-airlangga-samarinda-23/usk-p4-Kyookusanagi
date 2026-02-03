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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="max-width: 600px; text-align: center;">
        <h2>Selamat Datang di Sistem Perpustakaan</h2>
        <p>Sistem manajemen perpustakaan modern untuk admin dan anggota.</p>
        <div style="margin-top: 30px;">
            <a href="login.php" style="display: inline-block; margin-right: 20px; padding: 15px 30px; background: linear-gradient(135deg, #1976d2 0%, #1565c0 100%); color: white; text-decoration: none; border-radius: 8px; font-weight: 600;">Login</a>
            <a href="register.php" style="display: inline-block; padding: 15px 30px; background: linear-gradient(135deg, #4caf50 0%, #388e3c 100%); color: white; text-decoration: none; border-radius: 8px; font-weight: 600;">Register</a>
        </div>
    </div>
</body>
</html>
