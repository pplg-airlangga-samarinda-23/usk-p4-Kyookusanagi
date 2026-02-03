<?php
session_start();
if($_SESSION['role']!='admin'){ header("Location: ../index.php"); }
include '../koneksi.php';
if(isset($_POST['simpan'])){
    mysqli_query($koneksi,"INSERT INTO buku VALUES(NULL,'$_POST[judul]','$_POST[penulis]','$_POST[tahun]','$_POST[stok]')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku - Sistem Perpustakaan</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Buku</h2>
        <form method="post">
            <label for="judul">Judul</label>
            <input id="judul" name="judul" type="text" required>

            <label for="penulis">Penulis</label>
            <input id="penulis" name="penulis" type="text" required>

            <label for="tahun">Tahun</label>
            <input id="tahun" name="tahun" type="number" required>

            <label for="stok">Stok</label>
            <input id="stok" name="stok" type="number" required>

            <button name="simpan">Simpan</button>
        </form>
        <a href="index.php">Kembali</a>
    </div>
</body>
</html>
