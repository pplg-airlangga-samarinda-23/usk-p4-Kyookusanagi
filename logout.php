<?php
session_start();     // mulai / akses session
session_destroy();   // hapus semua session
header("Location: login.php"); // kembali ke halaman login
exit;
