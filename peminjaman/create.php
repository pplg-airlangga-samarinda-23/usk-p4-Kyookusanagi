<?php
session_start();
if($_SESSION['role']!='admin'){ header("Location: ../index.php"); }
include '../koneksi.php';

$message = "";
$message_type = "";

if(isset($_POST['tambah'])){
    $id_user = $_POST['id_user'];
    $id_buku = $_POST['id_buku'];

    // Validasi
    $cek_user = mysqli_query($koneksi, "SELECT * FROM users WHERE id=$id_user AND role='anggota'");
    $cek_buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id=$id_buku AND stok > 0");
    $cek_pinjam = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_user=$id_user AND id_buku=$id_buku AND tgl_kembali IS NULL");

    if(mysqli_num_rows($cek_user) == 0){
        $message = "Anggota tidak ditemukan.";
        $message_type = "error";
    } elseif(mysqli_num_rows($cek_buku) == 0){
        $message = "Buku tidak tersedia atau stok habis.";
        $message_type = "error";
    } elseif(mysqli_num_rows($cek_pinjam) > 0){
        $message = "Anggota sudah meminjam buku ini.";
        $message_type = "error";
    } else {
        mysqli_query($koneksi, "INSERT INTO peminjaman VALUES(NULL, $id_user, $id_buku, NOW(), NULL)");
        mysqli_query($koneksi, "UPDATE buku SET stok=stok-1 WHERE id=$id_buku");
        $message = "Peminjaman berhasil ditambahkan.";
        $message_type = "success";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman - Sistem Perpustakaan</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Peminjaman</h2>
        <?php if($message): ?>
            <p class="<?php echo $message_type; ?>"><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="post">
            <label for="id_user">Pilih Anggota</label>
            <select name="id_user" id="id_user" required>
                <?php
                $anggota = mysqli_query($koneksi,"SELECT * FROM users WHERE role='anggota'");
                while($a = mysqli_fetch_assoc($anggota)){
                    echo "<option value='$a[id]'>$a[username]</option>";
                }
                ?>
            </select>

            <label for="id_buku">Pilih Buku</label>
            <select name="id_buku" id="id_buku" required>
                <?php
                $buku = mysqli_query($koneksi,"SELECT * FROM buku WHERE stok>0");
                while($b = mysqli_fetch_assoc($buku)){
                    echo "<option value='$b[id]'>$b[judul] (Stok: $b[stok])</option>";
                }
                ?>
            </select>

            <button name="tambah">Tambah Peminjaman</button>
        </form>
        <a href="index.php">Kembali</a>
    </div>
</body>
</html>