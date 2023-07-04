<?php
include "../koneksi.php";

$nisn=$_POST["nisn"];
$tahun_bayar=$_POST["tahun_bayar"];

$sql = mysqli_query($koneksi,
	"SELECT tbulan.nama_bulan, 
	IFNULL(CONCAT('Rp. ', FORMAT(tpembayaran.jml_bayar,0)),'-') as bayar, 
	IFNULL(tpembayaran.tahun_bayar,'$tahun_bayar') as tahun_bayar, 
	IF(tpembayaran.jml_bayar IS NULL,'BELUM LUNAS','LUNAS') AS KETERANGAN, 
	IFNULL(tpembayaran.id_pembayaran, '') as idbayar FROM tbulan LEFT JOIN tpembayaran ON 
	(tpembayaran.bulan_bayar = tbulan.bulan and tpembayaran.tahun_bayar ='$tahun_bayar' and tpembayaran.nisn = '$nisn') 
	ORDER BY tbulan.bulan ASC");
while($data = mysqli_fetch_array($sql)){
	echo"
	<table>
	<tr>
	<td>".$data['nama_bulan']."</td>
	<td>".$data['bayar']."</td>
	<td>".$data['tahun_bayar']."</td>
	<td>".$data['KETERANGAN']."</td>
	<td>".$data['idbayar']."</td>
	</tr>
	</table>
	";
}



?>