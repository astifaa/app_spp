<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$nisn = $_POST['nisn'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$pass = $_POST['password'];
$id_kelas = $_POST['id_kelas'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$id_spp = $_POST['id_spp'];
$awaltempo	 = $_POST['tempo'];

$bulanIndo =[
 		'01' => 'januari',
 		'02' => 'Februari',
 		'03' => 'Maret',
 		'04' => 'April',
 		'05' => 'Mei',
 		'06' => 'Juni',
 		'07' => 'Juli',
 		'08' => 'Agustus',
 		'09' => 'September',
 		'10' => 'Oktober',
 		'11' => 'November',
 		'12' => 'Desember',
 	];
if ($nisn == '' || $nama == '' || $id_kelas ==''){
 		echo "Form belum lengkap";
 	}else {
 		$simpan = mysqli_query($koneksi,"INSERT INTO siswa(nisn,nis,nama,password,id_kelas,alamat,no_telp,id_spp)
 			VALUES('$nisn','$nis','$nama','$pass','$id_kelas','$alamat','$no_telp','$id_spp')

 		 ");
 		if(!$simpan) {
 			echo "
 			<script>
 			alert('data gagal disimpaan')
 			</script>
 			";
 		}else {
 			// ambil data id terakhir
 			$ds =mysqli_fetch_array(mysqli_query($koneksi, "SELECT nisn FROM siswa ORDER BY nisn DESC LIMIT 1"));
 			$nisn = $ds['nisn'];
 			// var_dump($idsiswa); die;
 			// taggihan dan simpan di tabel spp
 			for ($i=0 ; $i<12;$i++){
 				// tanggal jatuh tempo setiap tanggal 10
 				$tempo = date("Y-m-d" , strtotime("+$i month" , strtotime($awaltempo)));

 				$bulan     = $bulanIndo[date('m' ,strtotime($tempo))]."  ".date('Y', strtotime($tempo));
 				// simpan data
 				$add = mysqli_query($koneksi,"INSERT INTO pembayaran(nisn, tempo, bulan_dibayar, jumlah_bayar,id_spp) VALUES ('$nisn','$tempo','$bulan','$jumlah_bayar','$id_spp')");
 				
 			}
header("location:../admin/data_siswa.php");
 			
 			
 		}
 	}

?>