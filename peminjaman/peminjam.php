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
    <title>Data Peminjaman - Sistem Perpustakaan</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container" style="max-width: 800px;">
        <h2>Data Peminjaman Saya</h2>
        <table>
            <tr>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
            </tr>
            <?php
            $q = mysqli_query($koneksi,"
            SELECT b.judul, p.tgl_pinjam, p.tgl_kembali
            FROM peminjaman p
            JOIN buku b ON p.id_buku=b.id
            WHERE p.id_user = $_SESSION[id]
            ");
            while($p = mysqli_fetch_assoc($q)){
                echo "<tr>
                <td>$p[judul]</td>
                <td>$p[tgl_pinjam]</td>
                <td>".($p['tgl_kembali'] ?? '-')."</td>
                <td>".($p['tgl_kembali'] ? 'Dikembalikan' : 'Dipinjam')."</td>
                </tr>";
            }
            ?>
        </table>
        <a href="../dashboard_anggota.php">Kembali</a>
    </div>
</body>
</html>
