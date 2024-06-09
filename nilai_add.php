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
		 <h2>TAMBAH NILAI</h2>
		 <form method="post">
		 <div class="mb-3">
		 <label class="form-label">Kode Nilai</label>
		 <input type="text" class="form-control" name="kd_nilai" placeholder="Masukkan 
		Kode nilai">
		 </div>
		<div class="mb-3">
                <label class="form-label">NIS</label>
                <select class="form-select" name="nis">
                    <?php
                    include "koneksi.php";
                    $query_nis = "SELECT * FROM siswa";
                    $result_nis = mysqli_query($connection, $query_nis);
                    while ($row_nis = mysqli_fetch_assoc($result_nis)) {
                        echo "<option value='" . $row_nis['nis'] . "'>" . $row_nis['nis'] . "</option>";
                    }
                    ?>
                </select>
            </div>

		<div class="mb-3">
                <label class="form-label">Kode Matpel</label>
                <select class="form-select" name="kd_matpel">
                    <?php
                    include "koneksi.php";
                    $query_matpel = "SELECT * FROM matpel";
                    $result_matpel = mysqli_query($connection, $query_matpel);
                    while ($row_matpel = mysqli_fetch_assoc($result_matpel)) {
                        echo "<option value='" . $row_matpel['kd_matpel'] . "'>" . $row_matpel['kd_matpel'] . "</option>";
                    }
                    ?>
                </select>
            </div>


		 <div class="mb-3">
		 <label class="form-label">Nilai P</label>
		 <input type="number" class="form-control" name="nilai_p" 
		placeholder="Masukkan Nilai P">
		 </div>

		 <div class="mb-3">
		 <label class="form-label">Nilai K</label>
		 <input type="number" class="form-control" name="nilai_k" 
		placeholder="Masukkan Nilai K">
		 </div>

		 <div class="mb-3">
		 <label class="form-label">Semester</label>
		 <input type="number" class="form-control" name="semester" 
		placeholder="Masukkan Semester">
		 </div>

		 <div class="mb-3">
		 <label class="form-label">Tapel</label>
		 <input type="text" class="form-control" name="tapel" 
		placeholder="Masukkan Tapel">
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
		$kd_nilai = $_POST['kd_nilai'];
		$nis = $_POST['nis'];
		$kd_matpel = $_POST['kd_matpel'];
		$nilai_p = $_POST['nilai_p'];
		$nilai_k = $_POST['nilai_k'];
		$semester = $_POST['semester'];
		$tapel = $_POST['tapel'];

		$sql = "INSERT INTO nilai 
		values('$kd_nilai','$nis','$kd_matpel','$nilai_p','$nilai_k','$semester','$tapel')";
		$result = mysqli_query($connection,$sql);
		if($result){
		header('location:nilai_view.php');
		}else{
		echo "Gagal tersimpan";
		}
		}
		?>
</body>
</html>
