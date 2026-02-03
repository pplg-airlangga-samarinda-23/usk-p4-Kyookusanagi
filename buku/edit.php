<?php
session_start();
if($_SESSION['role']!='admin'){ header("Location: ../index.php"); }
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM buku WHERE id=$id");
$b = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    mysqli_query($koneksi,"UPDATE buku SET judul='$_POST[judul]', penulis='$_POST[penulis]', tahun='$_POST[tahun]', stok='$_POST[stok]' WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku - Sistem Perpustakaan</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Buku</h2>
        <form method="post">
            <label for="judul">Judul</label>
            <input id="judul" name="judul" type="text" value="<?php echo $b['judul']; ?>" required>

            <label for="penulis">Penulis</label>
            <input id="penulis" name="penulis" type="text" value="<?php echo $b['penulis']; ?>" required>

            <label for="tahun">Tahun</label>
            <input id="tahun" name="tahun" type="number" value="<?php echo $b['tahun']; ?>" required>

            <label for="stok">Stok</label>
            <input id="stok" name="stok" type="number" value="<?php echo $b['stok']; ?>" required>

            <button name="update">Update</button>
        </form>
        <a href="index.php">Kembali</a>
    </div>
</body>
</html>
