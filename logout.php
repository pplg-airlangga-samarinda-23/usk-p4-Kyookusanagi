<?php
session_start();     // mulai / akses session
session_destroy();   // hapus semua session
header("Location: index.php"); // kembali ke halaman utama
exit;
