<?php
//Include file koneksi ke database
include "../koneksi.php";

//menerima nilai dari kiriman form input
$nama_kelas=$_POST["nama_kelas"];
$kompetensi_keahlian=$_POST["kompetensi_keahlian"];

//Query input menginput data kedalam tabel 
  $sql="INSERT into kelas (nama_kelas,kompetensi_keahlian) values
		('$nama_kelas','$kompetensi_keahlian')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($koneksi,$sql);

// //Kondisi apakah berhasil atau tidak
//   if ($hasil) {
// 	echo "Berhasil insert data";
// 	exit;
//   }
// else {
// 	echo "Gagal insert data";
// 	exit;
// }  

// mengalihkan halaman kembali
header("location:../admin/data_kelas.php");

?>