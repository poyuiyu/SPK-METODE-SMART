<?php 

session_start();
include '../koneksi.php';
if(isset($_GET['nama_kriteria'])) {

	$kriteria = $_GET['nama_kriteria'];
	mysqli_query($dbconnection, "DELETE FROM kriteria_kost WHERE nama_kriteria = '$kriteria'");
	echo "<script>confirm('Berhasil Menghapus Kriteria')</script>";
	header("location:../kriteria.php");
} else {

	echo "<script>confirm('Gagal Menghapus Kriteria')</script>";
	header("location:../kriteria.php");
}

?>