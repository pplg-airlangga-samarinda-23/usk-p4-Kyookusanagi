<?php
session_start();
if($_SESSION['role']!='admin'){ header("Location: ../index.php"); }
include '../koneksi.php';

$data = mysqli_query($koneksi,"
SELECT
    p.id,
    u.username,
    b.judul,
    p.tgl_pinjam,
    p.tgl_kembali
FROM peminjaman p
JOIN users u ON p.id_user = u.id
JOIN buku b ON p.id_buku = b.id
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Peminjaman - Sistem Perpustakaan</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container" style="max-width: 1000px;">
        <h2>Kelola Peminjaman</h2>
        <table>
            <tr>
                <th>Nama</th>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php while($p = mysqli_fetch_assoc($data)){ ?>
            <tr>
                <td><?php echo $p['username']; ?></td>
                <td><?php echo $p['judul']; ?></td>
                <td><?php echo $p['tgl_pinjam']; ?></td>
                <td><?php echo $p['tgl_kembali'] ?? '-'; ?></td>
                <td><?php echo $p['tgl_kembali'] ? 'Dikembalikan' : 'Dipinjam'; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $p['id']; ?>">Edit</a> |
                    <a href="delete.php?id=<?php echo $p['id']; ?>" onclick="return confirm('Yakin hapus peminjaman ini?')">Hapus</a>
                    <?php if(!$p['tgl_kembali']){ ?>
                        | <a href="kembalikan.php?id=<?php echo $p['id']; ?>">Kembalikan</a>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </table>
        <a href="../dashboard_admin.php">Kembali</a>
    </div>
</body>
</html>
