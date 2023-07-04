<?php 
session_start();
if(isset($_SESSION['login']) ) {
	include '../koneksi.php';
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Slip Pembayaran SPP</title>

		<style >
			body{
				font-family: arial;
			}
			.print{
				margin-top: 10px;
			}
			@media print{
				.print{
					display: none;
				}
			}
			table{
				border-collapse: collapse;
			}
		</style>
	</head>
	<body>
		<h3>SMK TEKNOLOGI INDUSTRI PEMBANGUNAN CIMAHI<b><br/>LAPORAN PEMBAYARAN SPP</b></h3>
		<br/>
		<hr/>
		<?php 
		$siswa = $koneksi->query("SELECT * FROM 
			siswa,kelas,spp
			WHERE 
			siswa.id_kelas = kelas.id_kelas
			AND
			siswa.id_spp = spp.id_spp 
			AND siswa.nisn='$_GET[nisn]' ");
		$sw = mysqli_fetch_assoc($siswa);

		?>
		<table>
			<tr>
				<td>Nama Siswa </td>
				<td>:</td>
				<td> <?= $sw['nama'] ?></td>
			</tr>
			<tr>
				<td>Nis </td>
				<td>:</td>
				<td> <?= $sw['nisn'] ?></td>
			</tr>
			<tr>
				<td>Kelas </td>
				<td>:</td>
				<td> <?= $sw['kompetensi_keahlian'] ?></td>
			</tr>
		</table>
		<hr>
		<table border="1" cellspacing="" cellpadding="4" width="100%">
			<tr>
				<th>NO</th>
				<th>ID</th>
				<th>NO. BAYAR</th>
				<th>PEMBAYARAN BULAN</th>
				<th>JUMLAH</th>
				<th>KETERANGAN</th>
			</tr>
			<?php 
			$spp = $konek -> query("SELECT pembayaran.*,siswa.nisn,siswa.nama,kelas.kompetensi_keahlian
				FROM pembayaran INNER JOIN siswa ON pembayaran.nisn=siswa.nisn
				WHERE id_pembayaran ='$_GET[id_pembayaran]'
				ORDER BY tgl_bayar ASC");
			$i=1;
			$total = 0;
			while($dta=mysqli_fetch_array($spp)) :
				?>
				<tr>
					<td align="center"><?= $i ?></td>
					<td align="center"><?= $dta['nisn'] ?></td>
					<td align=""><?= $dta['tgl_bayar'] ?></td>
					<td align=""><?= $dta['bulan_dibayar'] ?></td>
					<td align="right"><?= $dta['jumlah_bayar'] ?></td>
					<td align="center"><?= $dta['status'] ?></td>
				</tr>
				<?php $i++; ?>


			<?php endwhile; ?>

		</table>
		<table width="100%">
			<tr>
				<td></td>
				<td width="200px">
					<BR/>
					<p>Cimahi , <?= date('d/m/y') ?> <br/>
						Operator,
						<br/>
						<br/>
						<br/>
						<p>__________________________</p>
					</td>
				</tr>
			</table>


			<a  href="#" onclick="window.print();"><button class="print">CETAK</button></a>
		</body>
		</html>


		<?php 
	} else {
		header("location : login.php");
	}
	?>