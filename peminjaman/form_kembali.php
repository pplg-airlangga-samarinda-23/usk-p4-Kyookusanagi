<?php
session_start();
include '../koneksi.php';

$data = mysqli_query($koneksi,"
SELECT p.id, b.judul
FROM peminjaman p
JOIN buku b ON p.id_buku=b.id
WHERE p.id_user=$_SESSION[id] AND p.tgl_kembali IS NULL
");
?>
<form method="post" action="kembalikan.php">
<select name="id">
<?php while($p=mysqli_fetch_assoc($data)){ ?>
<option value="<?=$p['id']?>"><?=$p['judul']?></option>
<?php } ?>
</select>
<button>Kembalikan</button>
</form>
