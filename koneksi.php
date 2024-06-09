<?php
// Deklarasi variabel
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_sekolah"; 

// Koneksi ke database
$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check koneksi
if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
