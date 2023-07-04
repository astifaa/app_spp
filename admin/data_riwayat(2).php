<?php include'../layout/header_admin.php'; ?>
<?php include'../layout/nav_admin.php'; ?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Riwayat Pembayaran</h3>
          </div>
          <!-- /.card-header -->

          <div class="card-body">
            <form method="post" action="aksi.php">
              <input type="text" name="nisn" class="form-group" placeholder="Nisn">
              <input type="text" name="tahun_bayar" placeholder="Tahun">
              <input type="submit" name="" value="cari">
            </form>
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Nama Bulan</th>
                  <th>Bayar</th>
                  <th>Tahun Bayar</th>
                  <th>Keterangan</th>
                  <th>ID Bayar</th>
                </tr>
              </thead>
              <tbody>
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
                  ?>
                  <tr>
                    <td><?php echo $d['nama_bulan']; ?></td>
                    <td><?php echo $d['bayar']; ?></td>
                    <td><?php echo $d['tahun_bayar']; ?></td>
                    <td><?php echo $d['KETERANGAN']; ?></td>
                    <td><?php echo $d['idbayar']; ?></td>
                    <td>
                      <a href="#">

                        <i class="nav-icon fas fa-edit"></i>
                      </a>
                      <a>|</a>
                      <a href="#">

                        <i class="nav-icon fas fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <?php 
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include'../layout/footer.php'; ?>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script src="rupiah.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

  // Format mata uang.
  $( '.uang' ).mask('000.000.000', {reverse: false});

})
</script>