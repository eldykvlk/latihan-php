<?php
session_start(); // Mulai sesi
include 'koneksi.php';

// Mengambil data dari form login
$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

// Query ke database untuk memeriksa data pengguna
$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($connection, $query);

// Memeriksa hasil query
if ($result) {
    // Memeriksa apakah ada baris yang ditemukan
    if (mysqli_num_rows($result) == 1) {
        // Data pengguna ditemukan, set session dan redirect ke halaman home.php
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location: guru_view.php"); // Arahkan ke halaman home.php
        exit(); // Hentikan eksekusi skrip setelah melakukan redirect
    } else {
        // Jika tidak ada baris yang ditemukan, kembali ke halaman login dengan pesan kesalahan
        $_SESSION['error'] = "Username atau password salah";
        header("location: index.php"); // Arahkan ke halaman index.php
        exit(); // Hentikan eksekusi skrip setelah melakukan redirect
    }
} else {
    // Jika query gagal dieksekusi, tampilkan pesan error
    $_SESSION['error'] = "Gagal melakukan query: " . mysqli_error($connection);
    header("location: index.php"); // Arahkan ke halaman index.php
    exit(); // Hentikan eksekusi skrip setelah melakukan redirect
}

// Tutup koneksi
mysqli_close($connection);
?>
