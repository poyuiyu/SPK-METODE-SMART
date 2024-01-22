<?php

session_start();

if($_SESSION['stat']!='masuk'){

	echo "<script>alert('Anda Belum Login')</script>";
	header("location:login.php?id=out");
}

?>