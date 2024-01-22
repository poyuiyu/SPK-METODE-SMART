<?php 

include 'koneksi.php';
require_once 'navigasi.php';

?>

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Skor Kost</h1>
			</div>

			<div class="col-lg-8">
				<form role="form" method="POST" action="">
					<div class="form-group">
						<input  type="text" name="kode_kost" class="form-control" placeholder="Kode Kost">
					</div>

					<div class="form-group">
						<input  type="text" name="nilai_fasilitas" class="form-control" placeholder="Nilai Fasilitas">
					</div>

					<div class="form-group">
						<input  type="text" name="nilai_harga" class="form-control" placeholder="Nilai Harga">
					</div>

					<div class="form-group">
						<input  type="text" name="nilai_subjektif" class="form-control" placeholder="Nilai Subjektif">
					</div>

					<div class="form-group">
						<input  type="text" name="nilai_sistem_kontrak" class="form-control" placeholder="Nilai Sistem Kontrak">
					</div>

					<div class="form-group">
						<input  type="text" name="nilai_jarak" class="form-control" placeholder=" Nilai Jarak Dengan Daerah Kampus">
					</div>

						<div class="form-group">
						<input  type="text" name="nilai_luas_kamar" class="form-control" placeholder=" Nilai Luas Kamar">
					</div>

					<div class="form-group">
					<input type="submit" name="submit" class=" btn btn-success form-control" value="input" placeholder="input">
					</div>
					
				</form>

				<?php 

				if (isset($_POST['submit'])){

					$kode_kost = $_POST['kode_kost'];
					$nilai_fasilitas = $_POST['nilai_fasilitas'];
					$nilai_harga = $_POST['nilai_harga'];
					$nilai_subjektif = $_POST['nilai_subjektif'];
					$nilai_sistem_kontrak = $_POST['nilai_sistem_kontrak'];
					$nilai_jarak = $_POST['nilai_jarak'];
					$nilai_luas_kamar = $_POST['nilai_luas_kamar'];


					$sqlceknilai = "SELECT * FROM penilaian WHERE kode_kost=$kode_kost";
					$sqlcek = "SELECT * FROM kost WHERE kode_kost = $kode_kost";
					$cekquery = mysqli_query($dbconnection,$sqlcek);

					if(mysqli_num_rows($cekquery) < 1){

						echo "<script>alert('Data Kost Tidak Ditemukan')</script>";
					} else {

						if(mysqli_num_rows(mysqli_query($dbconnection,$sqlceknilai)) < 1 ){
							$sql = "INSERT INTO penilaian (kode_kost, fasilitas, harga, subjektif, sistem_kontrak, jarak_ke_kampus, luas_kamar) VALUES ('$kode_kost', '$nilai_fasilitas', '$nilai_harga', '$nilai_subjektif', '$nilai_sistem_kontrak', '$nilai_jarak', '$nilai_luas_kamar')";
							$query = mysqli_query($dbconnection,$sql);
							if($query) {

								echo "<script>alert('Berhasil Memasukkan Data Penilaian')</script>";
							} else {

								echo "<script>alert('Gagal Memasukkan Data')</script>";
							}
						} else {

							echo "<script>alert('Duplikasi Data Dengan Kode Barang Tersebut')</script>";
						}
					}
				}

				?>
				
			</div>

			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Data Alternatif
					</div>

					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Kost</th>
										<th>Nama Kost</th>
										<th>Nilai Fasilitas</th>
										<th>Nilai Harga</th>
										<th>Nilai Subjektif</th>
										<th>Nilai Sistem Kontrak</th>
										<th>Nilai Jarak Dengan Daerah Kampus</th>
										<th>Nilai Luas Kamar</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php 

									$sql = "SELECT * FROM penilaian";
									$query = mysqli_query($dbconnection, $sql);
									$n = 1;


									while($kost = mysqli_fetch_array($query)) {

										$kode_kost = $kost['kode_kost'];
										$sqlnamakost = "SELECT nama_kost from kost WHERE kode_kost = $kode_kost";
										$namakost = mysqli_fetch_array(mysqli_query($dbconnection,$sqlnamakost));
									
									?>

									<tr>
										<td><?=$n?></td>
										<!-- <td><?=$barang['kode_barang']?></td> -->
										<td><?=$kost['kode_kost']?></td>
										<td><?=$namakost['nama_kost']?></td>
										<td class="text-right"><?=$kost['fasilitas']?></td>
										<td class="text-right"><?=$kost['harga']?></td>
										<td class="text-right"><?=$kost['subjektif']?></td>
										<td class="text-right"><?=$kost['sistem_kontrak']?></td>
										<td class="text-right"><?=$kost['jarak_ke_kampus']?></td>
										<td class="text-right"><?=$kost['luas_kamar']?></td>
										
										<td><a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')" href="aksi/hapus_skor.php?nama_kost=<?=$kost['kode_kost'];?>">hapus</a> | <a href="">edit</a></td>
									</tr>

									<?php 

									$n++;
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