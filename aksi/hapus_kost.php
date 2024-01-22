<?php 

session_start();
include '../koneksi.php';

if(isset($_GET['kode'])) {

	$kode_kost = $_GET['kode'];
	mysqli_query($dbconnection, "DELETE FROM kost WHERE kode_kost = '$kode_kost'");
	mysqli_query($dbconnection, "DELETE FROM penilaian WHERE kode_kost = '$kode_kost'");
	echo "<script>confirm('Berhasil Menghapus Data Kost')</script>";
	header("location:../alternatif.php");
} else {
	
	echo "<script>alert('Data gagal dihapus')</script>";
	header("location:../alternatif.php");
}

?>