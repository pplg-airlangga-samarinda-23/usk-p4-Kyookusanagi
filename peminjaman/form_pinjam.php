<?php
session_start();
if($_SESSION['role']!='anggota'){ header("Location: ../index.php"); }
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku - Sistem Perpustakaan</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Pinjam Buku</h2>
        <?php
        if(isset($_GET['error'])){
            echo "<p class='error'>".$_GET['error']."</p>";
        }
        ?>
        <form method="post" action="pinjam.php">
            <label for="id_buku">Pilih Buku</label>
            <select name="id_buku" id="id_buku" required>
                <?php
                $buku = mysqli_query($koneksi,"SELECT * FROM buku WHERE stok>0");
                while($b = mysqli_fetch_assoc($buku)){
                    echo "<option value='$b[id]'>$b[judul] (Stok: $b[stok])</option>";
                }
                ?>
            </select>
            <button>Pinjam</button>
        </form>
        <a href="../dashboard_anggota.php">Kembali</a>
    </div>
</body>
</html>
