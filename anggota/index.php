<?php
session_start();
if($_SESSION['role']!='admin'){ header("Location: ../login.php"); }
include '../koneksi.php';

$data = mysqli_query($koneksi,"SELECT * FROM users");
?>
<h2>Kelola Anggota</h2>

<table border="1">
<tr>
    <th>Username</th>
    <th>Role</th>
    <th>Aksi</th>
</tr>

<?php while($u=mysqli_fetch_assoc($data)){ ?>
<tr>
    <td><?= $u['username'] ?></td>
    <td><?= $u['role'] ?></td>
    <td>
        <a href="edit.php?id=<?= $u['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $u['id'] ?>">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>

<a href="../dashboard_admin.php">Kembali</a>
