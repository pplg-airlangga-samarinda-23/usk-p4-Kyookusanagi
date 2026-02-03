<?php
session_start();
if($_SESSION['role']!='admin'){ header("Location: ../index.php"); }
include '../koneksi.php';

$id = $_GET['id'];

$p = mysqli_fetch_assoc(
    mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE id=$id")
);

mysqli_query($koneksi,"
UPDATE peminjaman
SET tgl_kembali = CURDATE()
WHERE id=$id
");

mysqli_query($koneksi,"
UPDATE buku
SET stok = stok + 1
WHERE id = ".$p['id_buku']
);

header("Location: index.php");
?>
