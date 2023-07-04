<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include '../koneksi.php';
 
// menangkap data yang dikirim dari form login
$id_petugas = $_POST['id_petugas'];
$nama = $_POST['nama'];
$username = mysqli_real_escape_string($koneksi,$_POST['username']);
$password = mysqli_real_escape_string($koneksi,$_POST['password']);
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * from petugas where 
  username='$username'
  and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
  $data = mysqli_fetch_assoc($login);
 
  // cek jika user login sebagai admin
  if($data['level']=="admin"){
 
    // buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['id_petugas'] = $id_petugas;
    $_SESSION['level'] = "admin";
    $_SESSION['nama'] = $nama;
    // alihkan ke halaman dashboard admin
    header("location:../admin/admin.php");
 
  // cek jika user login sebagai petugas
  }else if($data['level']=="petugas"){
    // buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['level'] = "petugas";
    $_SESSION['status'] = "login";
    // alihkan ke halaman dashboard pegawai
    header("location:../petugas/petugas.php");
 
  }else{
 
    // alihkan ke halaman login kembali
    header("location:index.php?pesan=gagal");
  }  
}else{
  header("location:index.php?pesan=gagal");
}
 
?>