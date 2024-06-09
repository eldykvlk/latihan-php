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
		 <h2>TAMBAH KOMPETENSI</h2>
		 <form method="post">
		 <div class="mb-3">
		 <label class="form-label">Kode Kompetensi</label>
		 <input type="text" class="form-control" name="kd_kom" placeholder="Masukkan 
		Kode Kompetensi">
		 </div>
		 <div class="mb-3">
		 <label class="form-label">Nama Kompetensi</label>
		 <input type="text" class="form-control" name="nama_kom" placeholder="Masukkan 
		Nama Kompetensi">
		 </div>
		 <div class="mb-3">
		 <label class="form-label">Program Keahlian</label>
		 <input type="text" class="form-control" name="prog_kom" 
		placeholder="Masukkan Program keahlian">
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
		$kd_kom = $_POST['kd_kom'];
		$nama_kom = $_POST['nama_kom'];
		$prog_kom = $_POST['prog_kom'];

		$sql = "INSERT INTO kompetensi 
		values('$kd_kom','$nama_kom','$prog_kom')";
		$result = mysqli_query($connection,$sql);
		if($result){
		header('location:kompetensi_view.php');
		}else{
		echo "Gagal tersimpan";
		}
		}
		?>
</body>
</html>
