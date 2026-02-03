<?php
session_start();
if($_SESSION['role']!='anggota'){ header("Location: ../index.php"); }
include '../koneksi.php';

$data = mysqli_query($koneksi,"
SELECT p.id, b.judul
FROM peminjaman p
JOIN buku b ON p.id_buku=b.id
WHERE p.id_user=$_SESSION[id] AND p.tgl_kembali IS NULL
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kembalikan Buku - Sistem Perpustakaan</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Kembalikan Buku</h2>
        <form method="post" action="kembalikan_anggota.php">
            <label for="id">Pilih Buku yang Dikembalikan</label>
            <select name="id" id="id" required>
                <?php while($p = mysqli_fetch_assoc($data)){ ?>
                <option value="<?php echo $p['id']; ?>"><?php echo $p['judul']; ?></option>
                <?php } ?>
            </select>
            <button>Kembalikan</button>
        </form>
        <a href="../dashboard_anggota.php">Kembali</a>
    </div>
</body>
</html>
