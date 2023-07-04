<?php include'../layout/header_admin.php'; ?>
<?php include'../layout/nav_admin.php'; ?>
<?php 
include '../koneksi.php';
$nisn    =$_GET['nisn'];
$spp = mysqli_query($koneksi,"
  SELECT * 
  FROM 
  siswa,kelas,spp
  WHERE 
  siswa.id_kelas = kelas.id_kelas
  AND
  siswa.id_spp = spp.id_spp
  AND
  siswa.nisn = '$nisn'
  ");
$d    =mysqli_fetch_array($spp);
?>
<form method="post" action="simpan_pembayaran.php">
  <div id="tampil_modal" class="card-body">
    <div class="row">
      <div class="col-3">
        <div class="form-group">
          <label>NISN</label>
          <input type="text" class="form-control" value="<?php echo $_SESSION['id_petugas'] ?>" name="id_petugas" hidden="hidden">
          <input type="text" class="form-control" value="<?php echo $d['nisn']?>" name="nisn" readonly class="form-control-plaintext">
        </div>
      </div>
      <div class="col-3">
        <div class="form-group">
          <label>NAMA</label>
          <input type="text" class="form-control" value="<?php echo $d['nama']?>" readonly="readonly">
        </div>
      </div>
      <div class="col-1">
        <div class="form-group">
          <label>KELAS</label>
          <input type="text" class="form-control" value="<?php echo $d['id_kelas']?>" readonly="readonly">
        </div>
      </div>
      <div class="col-5">
        <div class="form-group">
          <label>JURUSAN</label>
          <input type="text" class="form-control" value="<?php echo $d['kompetensi_keahlian']?>" readonly="readonly">
        </div>
      </div>

    </div>
  </form>
  <hr style="border: 1px double ">
  <div class="panel panel-info">
  <div class="panel-heading">
    <h3>Tagihan SPP Siswa</h3>
  </div>
  <div class="panel-body ">
    <table class="table table-bordered table-striped">
      <tr>
        <th>NO</th>
        <th>Bulan</th>
        <th>Tanggal Bayar</th>
        <th>Jumlah</th>
        <th>Status</th>
        <th>Bayar</th>
      </tr>
      <?php 
      $sql= mysqli_query($koneksi," SELECT * FROM pembayaran,spp WHERE spp.id_spp = pembayaran.id_spp AND pembayaran.nisn = '$d[nisn]' ORDER BY pembayaran.tempo ASC ");
      $i=1;
      while($sq = mysqli_fetch_assoc($sql)){
        echo "
        <tr>
        <td>$i</td>
        <td>$sq[bulan_dibayar]</td>
        <td>$sq[tgl_bayar]</td>
        <td>$sq[nominal]</td>
        <td>$sq[status]</td>
        <td align='center'";
        if ($sq['status'] == ''){
          echo "<a   href='proses_transaksi.php?nisn=$nisn&act=bayar&id_pembayaran=$sq[id_pembayaran]'></a> ";
          echo "<a class='btn btn-primary btn-sm' href='proses_transaksi.php?nisn=$nisn&act=bayar&id_pembayaran=$sq[id_pembayaran]'>Bayar</a> ";
        }else {
          echo "</a>";
          echo "<a class='btn btn-danger btn-sm' href='proses_transaksi.php?nisn=$nisn&act=batal&id_pembayaran=$sq[id_pembayaran]'>Batal</a> ";
          echo "<a class='btn btn-success btn-sm' href='cetak_transaksi.php?nisn=$nisn&act=bayar&id_pembayaran=$sq[id_pembayaran]' target='_blank'>Cetak</a> ";
          
        }
        echo "</td>
        </tr>

        ";
        $i++;
      }
      ?>
    </table>
  </div>
</div>


</div>
<!-- /.card-body -->


</form>