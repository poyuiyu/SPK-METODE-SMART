<?php

 session_start();
 include 'koneksi.php';

if(isset($_GET['id'])) {
	if($_GET['id'] == 'false'){
 		echo "<script>alert('Username / Password salah. Silahkan Check Kembali Dengan Benar')</script>";
 		header("location:login.php");
 	} else if ($_GET['id'] == 'out') {

 		echo "<script>alert('Anda Belum Login, Silahkan Login Terlebih Dahulu.')</script>";
 		header("location:login.php");
 	} else {
 		echo "<script>alert('Logout Berhasil')</script>";
 		header("location:login.php");
 	}
 }

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SPK METODE SMART</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/metisMenu.min.css">
	<link rel="stylesheet" href="css/startmin.css">
	<link rel="stylesheet" href="css/font-awesome.min.css"
	type="text/css">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title text-center">SISTEM PENDUKUNG KEPUTUSAN METODE SMART</h2>
						<img class="img-fluid" src="css/loginimage.jpg"><br>
					</div>

					<div class="panel-body">
						
						<form role="form" action="" method="POST">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="Username" type="text" name="username" autofocus>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" type="password" name=password value="">
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember" value="Remember Me">
										Remember Me
									</label>
								</div>
								<input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Masuk">
							</fieldset>
						</form>
						<?php

						if(isset($_POST['submit'])){
							$username = $_POST['username'];
                            $password = $_POST['password'];


						$ambildatalogin = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
						$masukkanlogin = mysqli_query($dbconnection, $ambildatalogin);

						if(mysqli_num_rows($masukkanlogin) > 0){

							$_SESSION['username'] = $username;
							$_SESSION['stat'] = 'masuk';
							echo "<script>alert('Berhasil masuk, selamat datang admin $username')</script>";
							echo ($_SESSION['stat']);
							header("location:index.php");

						} else {

							echo "<script>alert(' Username / Password Salah ')</script>";
						}	
							
						}

						?>

					</div>


				</div>
			</div>
			
		</div>
		
	</div>

	 <!-- jQuery -->
        <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

</body>
</html>