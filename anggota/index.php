<?php
session_start();
if($_SESSION['role']!='admin'){ header("Location: ../index.php"); }
include '../koneksi.php';

$data = mysqli_query($koneksi,"SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Anggota - Sistem Perpustakaan</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container" style="max-width: 800px;">
        <h2>Kelola Anggota</h2>
        <table>
            <tr>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
            <?php while($u = mysqli_fetch_assoc($data)){ ?>
            <tr>
                <td><?php echo $u['username']; ?></td>
                <td><?php echo $u['role']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $u['id']; ?>">Edit</a> |
                    <a href="delete.php?id=<?php echo $u['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
        <a href="../dashboard_admin.php">Kembali</a>
    </div>
</body>
</html>
