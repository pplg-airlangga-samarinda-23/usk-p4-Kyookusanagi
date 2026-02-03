<?php
session_start();
if($_SESSION['role']!='admin'){ header("Location: ../index.php"); }
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT p.*, u.username, b.judul FROM peminjaman p JOIN users u ON p.id_user=u.id JOIN buku b ON p.id_buku=b.id WHERE p.id=$id");
$p = mysqli_fetch_assoc($data);

$message = "";
$message_type = "";

if(isset($_POST['update'])){
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'] ? "'$_POST[tgl_kembali]'" : "NULL";

    mysqli_query($koneksi, "UPDATE peminjaman SET tgl_pinjam='$tgl_pinjam', tgl_kembali=$tgl_kembali WHERE id=$id");

    // Jika dikembalikan, update stok
    if($_POST['tgl_kembali'] && !$p['tgl_kembali']){
        mysqli_query($koneksi, "UPDATE buku SET stok=stok+1 WHERE id=$p[id_buku]");
    } elseif(!$p['tgl_kembali'] && $_POST['tgl_kembali']){
        mysqli_query($koneksi, "UPDATE buku SET stok=stok-1 WHERE id=$p[id_buku]");
    }

    $message = "Peminjaman berhasil diupdate.";
    $message_type = "success";
    // Refresh data
    $data = mysqli_query($koneksi, "SELECT p.*, u.username, b.judul FROM peminjaman p JOIN users u ON p.id_user=u.id JOIN buku b ON p.id_buku=b.id WHERE p.id=$id");
    $p = mysqli_fetch_assoc($data);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjaman - Sistem Perpustakaan</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Peminjaman</h2>
        <p><strong>Anggota:</strong> <?php echo $p['username']; ?></p>
        <p><strong>Buku:</strong> <?php echo $p['judul']; ?></p>
        <?php if($message): ?>
            <p class="<?php echo $message_type; ?>"><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="post">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <input id="tgl_pinjam" name="tgl_pinjam" type="date" value="<?php echo $p['tgl_pinjam']; ?>" required>

            <label for="tgl_kembali">Tanggal Kembali (kosongkan jika belum dikembalikan)</label>
            <input id="tgl_kembali" name="tgl_kembali" type="date" value="<?php echo $p['tgl_kembali']; ?>">

            <button name="update">Update</button>
        </form>
        <a href="index.php">Kembali</a>
    </div>
</body>
</html>