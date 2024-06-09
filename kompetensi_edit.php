<?php
include "koneksi.php";
$kd_kom = $_GET['kd_kom'];
$sql = "SELECT * FROM kompetensi WHERE kd_kompetensi='$kd_kom'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Kompetensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
        <?php
            include "navigasi.php";
        ?>
    <div class="container">
        <h2>EDIT KOMPETENSI</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Kode Kompetensi</label>
                <input type="text" class="form-control" name="kd_kom" value='<?php echo $row['kd_kompetensi'];?>' placeholder="Masukkan Kode Kompetensi">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Kompetensi</label>
                <input type="text" class="form-control" name="nama_kom" value='<?php echo $row['nama_kompetensi'];?>' placeholder="Masukkan nama Kompetensi">
            </div>
            <div class="mb-3">
                <label class="form-label">Program Keahlian</label>
                <input type="text" class="form-control" name="prog_kom" value='<?php echo $row['prog_keahlian'];?>' placeholder="Masukkan Program keahlian">
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Kirim">
            </div>
        </form>
    </div>
    <?php
    include "koneksi.php";
    if(isset($_POST['submit'])){
        $kd_kom = $_POST['kd_kom'];
        $nama_kom = $_POST['nama_kom'];
        $prog_kom = $_POST['prog_kom'];

        $sql = "UPDATE kompetensi SET 
        nama_kompetensi='$nama_kom', prog_keahlian='$prog_kom' WHERE kd_kompetensi='$kd_kom'";
        $result = mysqli_query($connection,$sql);
        if($result){
            header('location:kompetensi_view.php');
        } else {
            echo "Gagal tersimpan";
        }
    }
    ?>
</body>
</html>
