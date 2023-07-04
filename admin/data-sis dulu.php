<?php include'../layout/header_admin.php'; ?>
<?php include'../layout/nav_admin.php'; ?>
<?php include'../koneksi.php';

$spp=mysqli_query($koneksi, "SELECT * FROM spp");
$jsArray = "var nominal = new Array();\n"; 

?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Siswa</h3>
          </div>
          <!-- /.card-header -->

          <div class="card-body">
            <button type="button" class="btn btn-block btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Tambah Siswa</button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="simpan_siswa.php">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">NISN</label>
                            <input type="text" name="nisn" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">NIS</label>
                            <input type="text" name="nis" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Nama Siswa</label>
                            <input type="text" name="nama" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Password</label>
                            <input type="password" name="password" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">No Telepon</label>
                            <input type="text" name="no_telp" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Kelas</label>
                            <select class="form-control custom-select" name="id_kelas">
                              <option>-- Pilih --</option>
                              <?php 
                              $data = mysqli_query($koneksi,"SELECT * from kelas");
                              while($k = mysqli_fetch_array($data)){
                                ?>
                                <option><?php echo $k['id_kelas']," - ",$k['nama_kelas']," - ", $k['kompetensi_keahlian'] ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Alamat</label>
                            <textarea type="text" name="alamat" class="form-control">
                            </textarea>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">TAHUN</label>
                            <select onchange="changeValue(this.value)" class="form-control custom-select" name="id_spp">
                              <option>-- Pilih --</option>
                              <?php if(mysqli_num_rows($spp)) {?>
                                <?php while($row= mysqli_fetch_array($spp)) {?>
                                  <option value="<?php echo $row["id_spp"]?>"> 
                                    <?php echo $row["tahun"]?> </option>

                                    <?php $jsArray .= "nominal['" . $row['id_spp'] . "'] = {nominal:'" . addslashes($row['nominal']) . "'};\n"; } ?>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="bmd-label-floating">NOMINAL</label>
                                <input type="text" name="nominal" id="nominal" class="form-control" readonly="readonly">
                              </div>
                            </div>
                            <div class="col-4 col-md-4">
                              <div class="form-group">                      
                                <input type="submit" class="btn btn-primary" value="Simpan">
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>NISN</th>
                      <th>NAMA</th>
                      <th>KELAS</th>
                      <th>ALAMAT</th>
                      <th>NO TELPON</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $data = mysqli_query($koneksi,"
                      SELECT * 
                      FROM siswa,kelas
                      WHERE siswa.id_kelas=kelas.id_kelas
                      ");
                    while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                        <td><?php echo $d['nisn']; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['nama_kelas']," - ",$d['kompetensi_keahlian']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['no_telp']; ?></td>
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
    <script type="text/javascript">
      <?php echo $jsArray; ?>
      function changeValue(id_spp) {
        document.getElementById("nominal").value = nominal[id_spp].nominal;
      };
    </script>