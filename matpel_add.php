<!DOCTYPE html>
<html>

<head>
    <title>Menambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
        <?php
            include "navigasi.php";
        ?>
    <div class="container">
        <h2>TAMBAH MATPEL</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Kode matpel</label>
                <input type="text" class="form-control" name="kd_matpel" placeholder="Masukkan Kode Mata pelajaran">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama matpel</label>
                <input type="text" class="form-control" name="nama_matpel" placeholder="Masukkan Nama mata pelajaran">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah jam</label>
                <input type="text" class="form-control" name="jml_jam" placeholder="Masukkan Jumlah jam">
            </div>
            <div class="mb-3">
                <label class="form-label">Tingkat</label>
                <input type="number" class="form-control" name="tingkat" placeholder="Masukkan Tingkat">
            </div>
            <div class="mb-3">
                <label class="form-label">Kode kompetensi</label>
                <select class="form-select" name="kd_kom">
                    <?php
                    include "koneksi.php";
                    $query_kompetensi = "SELECT * FROM kompetensi";
                    $result_kompetensi = mysqli_query($connection, $query_kompetensi);
                    while ($row_kompetensi = mysqli_fetch_assoc($result_kompetensi)) {
                        echo "<option value='" . $row_kompetensi['kd_kompetensi'] . "'>" . $row_kompetensi['kd_kompetensi'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">NIP</label>
                <select class="form-select" name="nip">
                    <?php
                    $query_guru = "SELECT * FROM guru";
                    $result_guru = mysqli_query($connection, $query_guru);
                    while ($row_guru = mysqli_fetch_assoc($result_guru)) {
                        echo "<option value='" . $row_guru['nip'] . "'>" . $row_guru['nip'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Kirim">
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $kd_matpel = $_POST['kd_matpel'];
        $nama_matpel = $_POST['nama_matpel'];
        $jml_jam = $_POST['jml_jam'];
        $tingkat = $_POST['tingkat'];
        $kd_kom = $_POST['kd_kom'];
        $nip = $_POST['nip'];

        $sql = "INSERT INTO matpel VALUES ('$kd_matpel','$nama_matpel','$jml_jam','$tingkat','$kd_kom','$nip')";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header('location:matpel_view.php');
        } else {
            echo "Gagal tersimpan";
        }
    }
    ?>
</body>

</html>
