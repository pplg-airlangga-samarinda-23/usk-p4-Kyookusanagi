<?php
session_start();
if($_SESSION['role']!='anggota'){ header("Location: ../index.php"); }
include '../koneksi.php';

$id_buku = (int)$_POST['id_buku'];
$id_user = (int)$_SESSION['id'];

// Validasi: cek apakah user ada
$cek_user = mysqli_query($koneksi, "SELECT * FROM users WHERE id=$id_user");
if(mysqli_num_rows($cek_user) == 0){
    // User tidak ada
    header("Location: ../index.php");
    exit;
}
$cek_buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id=$id_buku AND stok > 0");
if(mysqli_num_rows($cek_buku) == 0){
    // Buku tidak ada atau stok habis
    header("Location: form_pinjam.php?error=Buku tidak tersedia atau stok habis");
    exit;
}

// Validasi: cek apakah user sudah meminjam buku yang sama dan belum dikembalikan
$cek_pinjam = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_user=$id_user AND id_buku=$id_buku AND tgl_kembali IS NULL");
if(mysqli_num_rows($cek_pinjam) > 0){
    // Sudah meminjam buku yang sama
    header("Location: form_pinjam.php?error=Anda sudah meminjam buku ini");
    exit;
}

// Gunakan prepared statement untuk insert
$stmt = mysqli_prepare($koneksi, "INSERT INTO peminjaman (id_user, id_buku, tgl_pinjam) VALUES (?, ?, NOW())");
mysqli_stmt_bind_param($stmt, "ii", $id_user, $id_buku);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

// Update stok buku
$stmt2 = mysqli_prepare($koneksi, "UPDATE buku SET stok = stok - 1 WHERE id = ?");
mysqli_stmt_bind_param($stmt2, "i", $id_buku);
mysqli_stmt_execute($stmt2);
mysqli_stmt_close($stmt2);

header("Location: ../dashboard_anggota.php?success=Buku berhasil dipinjam");
?>