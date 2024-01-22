<?php 

	include 'koneksi.php';
	require_once 'navigasi.php';

?>

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Hasil Perhitungan Metode SMART (Simple Multi Attribute Rating Technique)</h1>
			</div>
			<div class="col-lg-12">
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
							<th>Nilai Bobot Hasil Evaluasi</th>
							<th>Rekomendasi Kost</th>
						</tr>
					</thead>
					<tbody>
						<?php 

							$n = 1;
							$sqljumlah = "SELECT SUM(bobot) FROM kriteria_kost";
							$queryjumlah = mysqli_query($dbconnection,$sqljumlah);
							$jumlah0 = mysqli_fetch_array($queryjumlah);
							$jumlah = $jumlah0[0];


							$sqlkriteria = "SELECT bobot FROM kriteria_kost";
							$querykriteria = mysqli_query($dbconnection, $sqlkriteria);
							$bobot = [];
							while ($bariskriteria = mysqli_fetch_array($querykriteria)) {

								$bobot[] = $bariskriteria['bobot'];

							}


								$sqlskor = "SELECT * FROM penilaian";
								$queryskor = mysqli_query($dbconnection,$sqlskor);

								while($barisskor = mysqli_fetch_array($queryskor)) {

									$kode_kost = $barisskor['kode_kost'];
									$sqlnamakost = "SELECT nama_kost FROM kost WHERE kode_kost = $kode_kost";
									$namakost = mysqli_fetch_array(mysqli_query($dbconnection,$sqlnamakost));


									$nilaiFasilitas = $barisskor['fasilitas']*($bobot[0]/$jumlah);
									$nilaiHarga = $barisskor['harga']*($bobot[1]/$jumlah);
									$nilaiSubjektif = $barisskor['subjektif']*($bobot[2]/$jumlah);
									$nilaiSistemKontrak = $barisskor['sistem_kontrak']*($bobot[3]/$jumlah);
									$nilaiJarakKeKampus = $barisskor['sistem_kontrak']*($bobot[4]/$jumlah);
									$nilaiLuasKamar = $barisskor['luas_kamar']*($bobot[5]/$jumlah);


									$nilaihasilevaluasi = $nilaiFasilitas + $nilaiHarga + $nilaiSubjektif + $nilaiSistemKontrak + $nilaiJarakKeKampus + $nilaiLuasKamar; 

									if($nilaihasilevaluasi >= 80) {

										$pilihan = "Kost Layak Ditempati";
									} elseif ($nilaihasilevaluasi >= 50) {
										
										$pilihan = "Kost Harus Di Check Langsung Keadaannya";
									} else {
										$pilihan = "Tidak Direkomendasi untuk Ditempati";
									}
									?>

									<tr>
										<td><?=$n?></td>
										<td><?=$barisskor['kode_kost']?></td>
										<td><?=$namakost['nama_kost']?></td>
										<td class="text-right"><?=$barisskor['fasilitas'] ?></td>
										<td class="text-right"><?=$barisskor['harga'] ?></td>
										<td class="text-right"><?=$barisskor['subjektif'] ?></td>
										<td class="text-right"><?=$barisskor['sistem_kontrak'] ?></td>
										<td class="text-right"><?=$barisskor['jarak_ke_kampus'] ?></td>
										<td class="text-right"><?=$barisskor['luas_kamar'] ?></td>
										<td class="text-right"><?= round($nilaihasilevaluasi,3)?>%</td>
										<td><?=$pilihan?></td>
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

<?php 
require_once 'foot.php';
?>