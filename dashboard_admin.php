<?php
session_start();
if($_SESSION['role']!='admin'){ header("Location: index.php"); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Sistem Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="max-width: 500px;">
        <h2>Dashboard Admin</h2>
        <ul style="list-style: none; padding: 0;">
            <li style="margin-bottom: 10px;"><a href="buku/index.php">Kelola Buku</a></li>
            <li style="margin-bottom: 10px;"><a href="anggota/index.php">Kelola Anggota</a></li>
            <li style="margin-bottom: 10px;"><a href="peminjaman/index.php">Kelola Peminjaman</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>
