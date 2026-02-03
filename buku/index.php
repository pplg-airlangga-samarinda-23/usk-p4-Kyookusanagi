<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Buku - Sistem Perpustakaan</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container" style="max-width: 800px;">
        <h2>Data Buku</h2>
        <a href="create.php">Tambah Buku</a>
        <form method="get" class="search-form">
            <input type="text" name="search" placeholder="Cari judul buku..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button type="submit">Cari</button>
        </form>
        <table>
            <tr><th>Judul</th><th>Stok</th><th>Aksi</th></tr>
            <?php
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $query = "SELECT * FROM buku";
            if($search){
                $query .= " WHERE judul LIKE '%$search%'";
            }
            $q = mysqli_query($koneksi, $query);
            while($b = mysqli_fetch_assoc($q)){
            ?>
            <tr>
                <td><?php echo $b['judul']; ?></td>
                <td><?php echo $b['stok']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $b['id']; ?>">Edit</a> |
                    <a href="delete.php?id=<?php echo $b['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
        <a href="../dashboard_admin.php">Kembali</a>
    </div>
</body>
</html>
