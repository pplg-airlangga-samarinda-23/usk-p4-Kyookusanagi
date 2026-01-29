<?php
session_start();
if($_SESSION['role']!='admin'){ header("Location: ../login.php"); }
include '../koneksi.php';

mysqli_query($koneksi,"DELETE FROM users WHERE id=$_GET[id]");
header("Location: index.php");
