<?php
session_start();
if(isset($_SESSION['role'])){
    if($_SESSION['role']=="admin"){
        header("Location: dashboard_admin.php");
    } else {
        header("Location: dashboard_anggota.php");
    }
}
?>
<h2>Sistem Perpustakaan</h2>
<a href="login.php">Login</a> |
<a href="register.php">Register</a>
