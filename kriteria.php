<?php 

	include 'koneksi.php';
	require_once 'navigasi.php';

?>

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Kriteria Kost</h1>
			</div>

			<div class="col-lg-8">
				<form role="form" action="" method="POST">
					<div class="form-group">
                         <input type="text" required name="kriteria" class="form-control" placeholder="nama kriteria">
                     </div>
                     <div class="form-group">
                         <input type="text" required name="bobot" class="form-control" placeholder="bobot">
                     </div>
					
					<div class="form-group">
						<input type="submit" name="submit" class="form-control btn btn-success form-control" value="Input" placeholder="submit">
					</div>
				</form>

				<?php 

					if(isset($_POST['submit'])) {

						$kriteria = $_POST['kriteria'];
						$bobot = $_POST['bobot'];

						$sql = "INSERT INTO kriteria_kost (nama_kriteria,bobot) VALUES ('$kriteria','$bobot')";

						$query = mysqli_query($dbconnection, $sql);

						if($query) { 

							echo "<script>alert('Berhasil memasukkan data Alternatif')</script>";
						} else {
							echo "<script>alert('Gagal Memasukkan Data')</script>";
						}

                        } else {

					}

				?>

			</div>


					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Data Kriteria
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Kriteria</th>
                                                <th>Bobot Kriteria</th>
                                                <th>Bobot Relatif</th>
                                                <th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php

											$sqljumlah = "SELECT SUM(bobot) FROM kriteria_kost";
											$queryjumlah = mysqli_query($dbconnection,$sqljumlah);
											$jumlah0 = mysqli_fetch_array($queryjumlah);
											$jumlah = $jumlah0[0];

											$sql = "SELECT * FROM kriteria_kost";
											$query = mysqli_query($dbconnection, $sql);
											$n = 1;
											while($barisbobot = mysqli_fetch_assoc($query)) {


											?>
											<tr>
												<td><?=$n?></td>
												<td><?=$barisbobot['nama_kriteria']?></td>
												<td class="text-right"><?=$barisbobot['bobot']?></td>
												<td class="text-right"><?=round($barisbobot['bobot']/$jumlah,3)?></td>
												<td><a onclick="return confirm('Anda yakin ingin menghapus data kriteria ?')" href="aksi/hapus_kriteria.php?nama_kriteria=<?=$barisbobot['nama_kriteria']?>">hapus</a> | <a href="">edit</a> </td>
											</tr>

										<?php

                                             $n++;

                                         }
                                             
                                        ?>
                                    




										<tr class="inverse">
											<td colspan="2">Total</td>
											<td class="text-right"><?=$jumlah?></td>
											<td class="text-right"></td>
											<td></td>
										</tr>


										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

		</div>
	</div>

	<?php 

	require_once 'foot.php';

	?>
	
</div>