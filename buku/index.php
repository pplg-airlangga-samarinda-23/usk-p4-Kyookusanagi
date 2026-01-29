<?php include '../koneksi.php'; ?>
<h2>Data Buku</h2>
<a href="create.php">Tambah</a>
<table border="1">
<tr><th>Judul</th><th>Stok</th><th>Aksi</th></tr>
<?php
$q=mysqli_query($koneksi,"SELECT * FROM buku");
while($b=mysqli_fetch_assoc($q)){
?>
<tr>
<td><?=$b['judul']?></td>
<td><?=$b['stok']?></td>
<td>
<a href="edit.php?id=<?=$b['id']?>">Edit</a>
<a href="delete.php?id=<?=$b['id']?>">Hapus</a>
</td>
</tr>
<?php } ?>
</table>
<a href="../dashboard_admin.php">Kembali</a>
