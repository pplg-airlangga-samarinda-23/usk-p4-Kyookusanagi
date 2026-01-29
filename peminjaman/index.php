<?php
session_start();
if($_SESSION['role']!='admin'){ header("Location: ../login.php"); }
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
<h2>Kelola Peminjaman</h2>

<table border="1">
<tr>
    <th>Nama</th>
    <th>Buku</th>
    <th>Tgl Pinjam</th>
    <th>Tgl Kembali</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php while($p=mysqli_fetch_assoc($data)){ ?>
<tr>
    <td><?= $p['username'] ?></td>
    <td><?= $p['judul'] ?></td>
    <td><?= $p['tgl_pinjam'] ?></td>
    <td><?= $p['tgl_kembali'] ?? '-' ?></td>
    <td>
        <?= $p['tgl_kembali'] ? 'Dikembalikan' : 'Dipinjam' ?>
    </td>
    <td>
        <?php if(!$p['tgl_kembali']){ ?>
            <a href="kembalikan.php?id=<?= $p['id'] ?>">Kembalikan</a>
        <?php } ?>
    </td>
</tr>
<?php } ?>
</table>

<a href="../dashboard_admin.php">Kembali</a>
