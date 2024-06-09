<!DOCTYPE html>
<html>
<head>
<title>Menambah Data</title>
		<link 
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
		rel="stylesheet" integrity="sha384-
		QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
		crossorigin="anonymous">
		 <script 
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
		integrity="sha384-
		YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
		crossorigin="anonymous"></script>
		</head>
		<body>
		<?php
			include "navigasi.php";
		?>
		 <div class="container">
		 <h2>TAMBAH SISWA</h2>
		 <form method="post">
		 <div class="mb-3">
		 <label class="form-label">NIS</label>
		 <input type="text" class="form-control" name="nis" placeholder="Masukkan 
		NIS">
		 </div>
		 <div class="mb-3">
		 <label class="form-label">Nama Siswa</label>
		 <input type="text" class="form-control" name="nama_siswa" placeholder="Masukkan 
		Nama">
		 </div>
		 <div class="mb-3">
		 <label class="form-label">tempat Lahir</label>
		 <input type="text" class="form-control" name="tempatLahir" 
		placeholder="Masukkan Tempat Lahir">
		 </div>
		 <div class="mb-3">
		 <label class="form-label">Tgl Lahir</label>
		 <input type="date" class="form-control" name="tglLahir" placeholder="Masukkan 
		Tgl Lahir">
		 </div>
		 <div class="mb-3">
		 <label class="form-label">Alamat</label>
		 <textarea class="form-control" rows="3" name="alamat"></textarea>
		 </div>
		 <div class="mb-3">
		 <label class="form-label">No Telepon</label>
		 <input type="text" class="form-control" name="noHp" placeholder="No HP">
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
		 <div class="d-grid gap-2 d-md-flex justify-content-md-end">
		 <input type="submit" class="btn btn-primary btn-lg" name="submit" 
		value="Kirim">
		 </div>
		 </form>
		</div>
		<?php
		include "koneksi.php";
		if(isset($_POST['submit'])){
		$nis = $_POST['nis'];
		$nama_siswa = $_POST['nama_siswa'];
		$tempatLahir = $_POST['tempatLahir'];
		$tglLahir = $_POST['tglLahir'];
		$alamat = $_POST['alamat'];
		$noHp = $_POST['noHp'];
		$kd_kom = $_POST['kd_kom'];
		$sql = "INSERT INTO siswa 
		values('$nis','$nama_siswa','$tempatLahir','$tglLahir','$alamat','$noHp','$kd_kom')";
		$result = mysqli_query($connection,$sql);
		if($result){
		header('location:siswa_view.php');
		}else{
		echo "Gagal tersimpan";
		}
		}
		?>
</body>
</html>
