<?php include '../koneksi.php'; ?>
<h2>Data Peminjaman</h2>
<table border="1">
<tr>
<th>Nama</th><th>Buku</th><th>Tgl Pinjam</th><th>Tgl Kembali</th>
</tr>
<?php
$q=mysqli_query($koneksi,"
SELECT u.username,b.judul,p.tgl_pinjam,p.tgl_kembali
FROM peminjaman p
JOIN users u ON p.id_user=u.id
JOIN buku b ON p.id_buku=b.id
");
while($p=mysqli_fetch_assoc($q)){
echo "<tr>
<td>$p[username]</td>
<td>$p[judul]</td>
<td>$p[tgl_pinjam]</td>
<td>".($p['tgl_kembali']??'-')."</td>
</tr>";
}
?>
</table>
