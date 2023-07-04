<?php
//Include file koneksi ke database
include "../koneksi.php";

//menerima nilai dari kiriman form input
$tahun=$_POST["tahun"];
$nominal=$_POST["nominal"];

//Query input menginput data kedalam tabel 
  $sql="INSERT into spp (tahun,nominal) values
		('$tahun','$nominal')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($koneksi,$sql);

// mengalihkan halaman kembali
header("location:../admin/data_spp.php");

?>