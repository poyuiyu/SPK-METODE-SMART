<?php  
session_start();
include '../koneksi.php';

if(isset($_GET['nama_kost'])) {

	$id_kode_kost = $_GET['nama_kost'];
	mysqli_query($dbconnection, "DELETE FROM penilaian WHERE kode_kost = '$id_kode_kost'");
	echo "<script>alert('Berhasil Menghapus Data')</script>";
	header("location:../skor.php");
} else {

	echo "<script>alert('Data gagal dihapus')</script>";
	header("location:../skor.php");
}


?>