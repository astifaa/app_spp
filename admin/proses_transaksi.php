<?php 
session_start();
include '../koneksi.php';
if($_GET['act']=='bayar') {
	$id_pembayaran = $_GET['id_pembayaran'];
	$nisn   = $_GET['nisn'];

	// 	// bulan
	// $today =date("ymd");
	// $query =mysqli_query($konek , "SELECT max(nobayar) AS last FROM spp WHERE nobayar LIKE '$today%'");
	// $data = mysqli_fetch_assoc($query);
	// $lastNobayar = $data['last'];
	// $lastNoUrut  = substr($lastNobayar, 6 ,4);
	// $nextNoUrut  = $lastNoUrut + 1;
	// $nextNobayar = $today.sprintf('%04s' , $nextNoUrut);

		// tanggal bayar
	$tgl_bayar = date('Y-m-d');

		// id admin
	$admin = $_SESSION['id_petugas'];

	$byr = mysqli_query($koneksi,"UPDATE pembayaran SET 
		tgl_bayar = '$tgl_bayar',
		status = 'LUNAS',
		id_petugas = '$admin' 
		WHERE id_pembayaran = '$id_pembayaran'");

	if ($byr) {

		header('location: lihat_siswa.php?nisn='.$nisn);
	}else {
		echo "
		<script>
		alert('gagal')
		</script>
		";

	}

}
else if($_GET['act']=='batal'){
	$id_pembayaran = $_GET['id_pembayaran'];
	$nisn  = $_GET['nisn'];

	$batal = mysqli_query($koneksi,"UPDATE pembayaran SET 
		tgl_bayar = null,
		status = null,
		id_petugas = null 
		WHERE id_pembayaran = '$id_pembayaran'");

	if ($batal) {
		header('location: lihat_siswa.php?nisn='.$nisn);
	}
}
?>