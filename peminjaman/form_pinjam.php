<?php include '../koneksi.php'; ?>
<form method="post" action="pinjam.php">
<select name="id_buku">
<?php
$buku=mysqli_query($koneksi,"SELECT * FROM buku WHERE stok>0");
while($b=mysqli_fetch_assoc($buku)){
echo "<option value='$b[id]'>$b[judul]</option>";
}
?>
</select>
<button>Pinjam</button>
</form>
