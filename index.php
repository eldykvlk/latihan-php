<?php
session_start(); // Mulai sesi
// Cek apakah sesi sudah ada dan statusnya adalah 'login'
if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){
    header("location: home.php"); // Arahkan ke halaman home.php jika sudah login
    exit(); // Hentikan eksekusi skrip setelah melakukan redirect
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS untuk menengahkan card */
        .card {
            margin: 0 auto;
            margin-top: 100px;
            max-width: 400px;
        }
        .card-body {
    background-color: lightblue;
    border-radius: 20px;
}
    </style>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Form Login</h2>
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tambahkan script JS Bootstrap jika diperlukan -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
