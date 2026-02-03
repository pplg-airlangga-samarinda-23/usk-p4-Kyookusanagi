<?php
session_start();
if($_SESSION['role']!='admin'){ header("Location: ../index.php"); }
include '../koneksi.php';

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM buku WHERE id=$id");
header("Location: index.php");
?>
