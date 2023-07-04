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
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>NISN</th>
                  <th>Nama</th>
                  <th>Tanggal Bayar</th>
                  <th>Bulan</th>
                  <th>Tahun</th>
                  <th>ID SPP</th>
                  <th>Jumlah Bayar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                include '../koneksi.php';
                $data = mysqli_query($koneksi,"
                  SELECT * 
                  FROM pembayaran,siswa
                  WHERE
                  siswa.nisn=pembayaran.nisn
                  ");
                while($r = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $r['nisn']; ?></td>
                    <td><?php echo $r['nama']; ?></td>
                    <td><?php echo $r['tgl_bayar']; ?></td>
                    <td><?php echo $r['bulan_dibayar']; ?></td>
                    <td><?php echo $r['tahun_dibayar']; ?></td>
                    <td><?php echo $r['id_spp']; ?></td>
                    <td><?php echo $r['jumlah_bayar']; ?></td>
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