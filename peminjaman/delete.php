<?php
session_start();
if($_SESSION['role']!='admin'){ header("Location: ../index.php"); }
include '../koneksi.php';

$id = $_GET['id'];

$p = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE id=$id"));

if($p){
    // Jika belum dikembalikan, kembalikan stok
    if(!$p['tgl_kembali']){
        mysqli_query($koneksi,"UPDATE buku SET stok=stok+1 WHERE id=$p[id_buku]");
    }

    mysqli_query($koneksi,"DELETE FROM peminjaman WHERE id=$id");
}

header("Location: index.php");
?>