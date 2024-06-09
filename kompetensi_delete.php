<?php
include "koneksi.php";
$kd_kom = $_GET['kd_kom'];
$sql = "DELETE From kompetensi where kd_kompetensi='$kd_kom'";
$result = mysqli_query($connection, $sql);
if($result){
header('location:kompetensi_view.php');
}else{
echo "Gagal terhapus";
}
?>