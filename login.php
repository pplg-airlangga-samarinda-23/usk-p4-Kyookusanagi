<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = $_POST['password'];

    $q = mysqli_query($koneksi,"SELECT * FROM users WHERE username='$u'");
    $d = mysqli_fetch_assoc($q);

    if($d && password_verify($p,$d['password'])){
        $_SESSION['id']=$d['id'];
        $_SESSION['role']=$d['role'];
        header("Location: dashboard_".$d['role'].".php");
    } else {
        echo "Login gagal";
    }
}
?>
<form method="post">
Username <input name="username"><br>
Password <input type="password" name="password"><br>
<button name="login">Login</button>
</form>
