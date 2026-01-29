<?php
session_start();
if($_SESSION['role']!='admin'){ header("Location: login.php"); }
?>
<h2>Dashboard Admin</h2>
<ul>
<li><a href="buku/index.php">Kelola Buku</a></li>
<li><a href="anggota/index.php">Kelola Anggota</a></li>
<li><a href="peminjaman/index.php">Kelola Peminjaman</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
