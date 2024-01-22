<?php

include 'koneksi.php';
require_once 'navigasi.php';

?>


<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Alternatif Kost</h1>
			</div>

			<div class="col-lg-8">
				<form role="form" action="" method="POST">
					<div class="form-group">
						<input type="text" required name="kode_kost" class="form-control" placeholder="Kode Kost ">
					</div>
					<div class="form-group">
						<input type="text" required name="nama_kost" class="form-control" placeholder="Nama Kost ">
					</div>

					<div class="form-group">
						<input type="text" required name="daerah_kost" class="form-control" placeholder="Daerah Kost ">
					</div>


					<div class="form-group">
						<input type="text" required name="nama_jalan_kost" class="form-control" placeholder="Nama Jalan Kost">
					</div>

					<div class="form-group">
						<input type="submit" name="submit" class="form-control btn btn-success form-control" value="Input" placeholder="submit">
					</div>
				</form>

				<?php 

				if(isset($_POST['submit'])) {

					$kode_kost = $_POST['kode_kost'];
					$nama_kost = $_POST['nama_kost'];
					$daerah_kost = $_POST['daerah_kost'];
					$nama_jalan_kost = $_POST['nama_jalan_kost'];

					$sql = "INSERT INTO kost (kode_kost,nama_kost,daerah_kost,nama_jalan_kost) VALUES ('$kode_kost','$nama_kost','$daerah_kost','$nama_jalan_kost')";
					$query = mysqli_query($dbconnection, $sql);

					if($query) {

						echo "<script>alert('Berhasil Memasukan data Alternatif')</script>";
					} else {
						echo "<script>alert('Gagal Memasukkan data')</script>";
					}
				} else {

					// tidak ada datang yang diinput
				}

				?>
			</div>

			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Data Alternatif Barang
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Kost</th>
										<th>Nama Kost</th>
										<th>Daerah Kost</th>
										<th>Nama Jalan Kost</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php 

									$sql = "SELECT * FROM kost";
									$query = mysqli_query($dbconnection, $sql);
									$no = 1;
									while($kost = mysqli_fetch_array($query)) { 

									?>

									<tr>
										<td><?=$no?></td>
										<td><?=$kost['kode_kost']?></td>
										<td><?=$kost['nama_kost']?></td>
										<td><?=$kost['daerah_kost']?></td>
										<td><?=$kost['nama_jalan_kost']?></td>
										<td><a onclick="return confirm('Apakah yakin ingin menghapus ?')" href="aksi/hapus_kost.php?kode=<?=$kost['kode_kost'];?>">Hapus</a> | <a href="">Edit</a> 
										</td>
									</tr>

									<?php 

									$no++;
									

										}

									?>

								
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>





		</div>
	</div>
</div>

<?php 

require_once 'foot.php';

?>