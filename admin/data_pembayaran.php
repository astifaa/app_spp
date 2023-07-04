<?php include'../layout/header_admin.php'; ?>
<?php include'../layout/nav_admin.php'; ?>
<?php 
include '../koneksi.php';
?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Siswa</h3>
          </div>
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>

                  <tr>
                    <th>NISN</th>
                    <th>NAMA</th>
                    <th>KELAS</th>
                    <th>TAHUN</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $spp = mysqli_query($koneksi,"
                    SELECT * 
                    FROM 
                    siswa,kelas,spp
                    WHERE 
                    siswa.id_kelas = kelas.id_kelas
                    AND
                    siswa.id_spp = spp.id_spp
                    ");

                  while($d = mysqli_fetch_array($spp)){
                    ?>
                    <tr>
                      <td><?php echo $d['nisn'] ?></td>
                      <td><?php echo $d['nama']; ?></td>
                      <td><?php echo $d['nama_kelas']," - ",$d['kompetensi_keahlian']; ?></td>
                      <td><?php echo $d['tahunajaran']; ?></td>
                      <td>
                        <a href="lihat_siswa.php?nisn=<?php echo $d['nisn']?>" type="button" class="btn btn-block btn-default btn-sm">Lihat</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <div class="modal fade" id="isimodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Pembayaran SPP</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form method="post" action="simpan_pembayaran.php">
                      <div id="tampil_modal" class="card-body">
                        <div class="row">
                          <div class="col-3">
                            <div class="form-group">
                              <label>NISN</label>
                              <input type="text" class="form-control" value="<?php echo $_SESSION['id_petugas'] ?>" name="id_petugas" hidden="hidden">
                              <input type="text" class="form-control" id="nisn" name="nisn" readonly class="form-control-plaintext">
                            </div>
                          </div>
                          <div class="col-3">
                            <div class="form-group">
                              <label>NAMA</label>
                              <input type="text" class="form-control" id="nama" readonly="readonly">
                            </div>
                          </div>
                          <div class="col-1">
                            <div class="form-group">
                              <label>KELAS</label>
                              <input type="text" class="form-control" id="id_kelas" readonly="readonly">
                            </div>
                          </div>
                          <div class="col-5">
                            <div class="form-group">
                              <label>JURUSAN</label>
                              <input type="text" class="form-control" id="kompetensi_keahlian" readonly="readonly">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-2">
                              <label>BULAN</label>
                              <select class="form-control" name="bulan_dibayar">
                                <option>JANUARI</option>
                                <option>FEBRUARI</option>
                                <option>MARET</option>
                                <option>APRIL</option>
                                <option>MEI</option>
                                <option>JUNI</option>
                                <option>JULI</option>
                                <option>AGUSTUS</option>
                                <option>SEPTEMBER</option>
                                <option>OKTOBER</option>
                                <option>NOVEMBER</option>
                                <option>DESEMBER</option>
                              </select>
                            </div>
                            <div class="col-2">
                              <label>TAHUN</label>
                              <input type="text" name="tahun_dibayar" id="tahun" class="form-control" readonly="readonly">
                            </div>
                            <div class="col-3">
                              <label>TANGGAL</label>
                              <input type="date" class="form-control" name="tgl_bayar">
                            </div>
                            <div class="col-3">
                              <label>JUMLAH BAYAR</label>
                              <input type="text" class="form-control" name="id_spp" id="id_spp"hidden="hidden">
                              <input type="text" class="form-control" placeholder="Rp." name="jumlah_bayar" id="nominal" readonly="readonly">
                            </div>
                            <div class="col-2">
                              <label style="color: white">....</label>
                              <input type="submit" value="Bayar" class="form-control btn btn-block btn-danger btn-md">
                            </div>
                          </div>
                        </div>
                      </form>
                      <hr style="border: 1px double ">
                      <table class="table table-bordered bg-light">
                        <div class="col-12 mb-3">
                        <span>Histori Pembayaran</span>
                        <div class="col-2" style="float: right;"><a href="cetak_spp.php" target="_blank" class="btn btn-block btn-secondary btn-xs">Cetak Laporan</a></div>
                        </div>
                        <thead>
                          <tr>
                            <th>BULAN</th>
                            <th>TAHUN</th>
                            <th>BIAYA</th>
                            <th>STATUS</th><!-- 
                            <th style="text-align: center;">AKSI</th> -->
                          </tr>
                        </thead>
                        <tbody id="tampil_modal">
                         <?php
                         $data = mysqli_query($koneksi,"SELECT * from pembayaran WHERE nisn=nisn");
                         while($d = mysqli_fetch_array($data)){
                          ?>
                          <tr>
                            <td><?php echo $d['bulan_dibayar']; ?></td>
                            <td><?php echo $d['tahun_dibayar']; ?></td>
                            <td><?php echo $d['jumlah_bayar']; ?></td>
                            <td>
                              <button type="button" class="btn btn-block btn-success btn-xs" id="tombol" onclick="klik()">LUNAS</button>
                            </td>
                            <!-- <td style="text-align: center;">
                              <a href="#"><i class="nav-icon fas fa-save" title="Simpan"></i></a>
                              <a>|</a>
                              <a href="cetak_spp.php?"><i class="nav-icon fas fa-print" title="Cetak"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-trash" title="Hapus"></i></a>
                            </td> -->
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>

                    </div>
                    <!-- /.card-body -->


                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
</section>

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

<script type="text/javascript">
  $(document).on("click", "#lihat_modal", function(){
    var nisn = $(this).data('nisn');
    var id_kelas = $(this).data('id_kelas');
    var kompetensi_keahlian = $(this).data('kompetensi_keahlian');
    var nama = $(this).data('nama');
    var tahun = $(this).data('tahun');
    var nominal = $(this).data('nominal');
    var id_spp = $(this).data('id_spp');

    var bulan_dibayar = $(this).data('bulan_dibayar');

    $("#tampil_modal #nisn").val(nisn);
    $("#tampil_modal #id_kelas").val(id_kelas);
    $("#tampil_modal #kompetensi_keahlian").val(kompetensi_keahlian);
    $("#tampil_modal #nama").val(nama);
    $("#tampil_modal #tahun").val(tahun);
    $("#tampil_modal #nominal").val(nominal);
    $("#tampil_modal #id_spp").val(id_spp);
    $("#tampil_modal #bulan_dibayar").text(bulan_dibayar);

    function tampil_histori(){
      var nisn=document.getElemenByid("nisn").innerHTML;
      document.getElemenByid("hasil").innerHTML=nisn;
    }
  })        
</script>