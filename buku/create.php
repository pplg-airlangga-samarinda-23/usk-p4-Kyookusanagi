<?php include '../koneksi.php';
if(isset($_POST['simpan'])){
mysqli_query($koneksi,"INSERT INTO buku VALUES(NULL,'$_POST[judul]','$_POST[penulis]','$_POST[tahun]','$_POST[stok]')");
header("Location: index.php");
}
?>
<form method="post">
Judul <input name="judul"><br>
Penulis <input name="penulis"><br>
Tahun <input name="tahun"><br>
Stok <input name="stok"><br>
<button name="simpan">Simpan</button>
</form>
