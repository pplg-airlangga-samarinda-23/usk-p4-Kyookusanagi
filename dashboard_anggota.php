<?php
session_start();
if($_SESSION['role']!='anggota'){ header("Location: login.php"); }
?>
<h2>Dashboard Anggota</h2>
<ul>
<li><a href="peminjaman/form_pinjam.php">Pinjam Buku</a></li>
<li><a href="peminjaman/form_kembali.php">Kembalikan Buku</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
