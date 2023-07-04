<?php
include "koneksi.php";

$sql = "select * from tb_transaksi where (tgl between '$_POST[dari]' and '$_POST[sampai]')";

$query=mysqli_query($koneksi,$sql);
$cek = mysqli_num_rows($query);
if (empty($cek)){
echo '<script>alert(\'Data Tidak Ada\')
 window.close()</script>';
}

$no=1;
while($r=mysqli_fetch_array($query)){ 
 echo "..
 ..
 ..
 ";
$no++;
echo"</tr>";
}

echo"</table>";

?>