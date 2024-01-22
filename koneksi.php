<?php 

$local = "localhost";
$usernameee = "root";
$passworddd = "";
$db = "kost_database";

$dbconnection = mysqli_connect($local, $usernameee, $passworddd, $db);

if(!$dbconnection){
	die('Gagal Masuk Ke Database : '.mysqli_connect_error());
} else {
	// echo "Berhasil Terhubung Ke Database";
}



?>