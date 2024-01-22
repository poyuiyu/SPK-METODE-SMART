<?php
session_start();
echo "<script>alert('Berhasil Logout')</script>";
session_destroy();
header("location:login.php");
?>