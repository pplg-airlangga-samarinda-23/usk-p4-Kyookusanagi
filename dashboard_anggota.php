<?php
session_start();
if($_SESSION['role']!='anggota'){ header("Location: index.php"); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Anggota - Sistem Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="max-width: 500px;">
        <h2>Dashboard Anggota</h2>
        <?php
        if(isset($_GET['success'])){
            echo "<p class='success'>".$_GET['success']."</p>";
        }
        ?>
        <ul style="list-style: none; padding: 0;">
            <li style="margin-bottom: 10px;"><a href="peminjaman/form_pinjam.php">Pinjam Buku</a></li>
            <li style="margin-bottom: 10px;"><a href="peminjaman/form_kembali.php">Kembalikan Buku</a></li>
            <li style="margin-bottom: 10px;"><a href="peminjaman/peminjam.php">Lihat Peminjaman Saya</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>
