<?php include'../layout/header_admin.php'; ?>
<?php include'../layout/nav_admin.php'; ?>
<?php include '../koneksi.php';?>
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
                    <th>NO TELEPONE</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $data = mysqli_query($koneksi,"SELECT * from siswa");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $d['nisn'] ?></td>
                      <td><?php echo $d['nama']; ?></td>
                      <td><?php echo $d['id_kelas']; ?></td>
                      <td><?php echo $d['no_telp']; ?></td>
                      <td>
                        <a id="lihat_modal" href="#" type="button" class="btn btn-block btn-default btn-sm" data-toggle="modal" data-target="#isimodal" 
                        data-nisn="<?php echo $d['nisn']?>"
                        data-id_kelas="<?php echo $d['id_kelas']?>"
                        data-nama="<?php echo $d['nama']?>"
                        >Lihat</a>
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
                    <div id="tampil_modal" class="card-body">
                      <table style="width: 100%;" class="bg-light">
                        <tr>
                          <th>
                            NISN &nbsp;&nbsp;&nbsp;: 
                            <span id="nisn" name="nisn"></span>
                          </th>
                          <th style="text-align: right;" >
                            KELAS &nbsp;: 
                            <span id="id_kelas" name="id_kelas"></span>
                          </th>
                        </tr>
                        <tr>
                          <td style="font-weight: bold;">
                            NAMA &nbsp;: 
                            <span id="nama" name="nama"></span>
                          </td>
                          <td>
                            <div class="card-tools">
                              <div class="input-group input-group-sm" style="width: 100px; float: right;">
                                <select class="form-control custom-select" name="tahun">
                                  <option selected="selected">Tahun</option>
                                  <?php
                                  for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                                    echo"<option value='$i'> $i </option>";
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </table>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>BULAN</th>
                            <th>TAHUN</th>
                            <th>BIAYA</th>
                            <th>STATUS</th>
                            <th style="text-align: center;">AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>JANUARI</td>
                            <td>2021</td>
                            <td>Rp. 155.000</td>
                            <td>
                              <button type="button" class="btn btn-block btn-success btn-xs" id="tombol" onclick="klik()">LUNAS</button>
                            </td>
                            <td>
                              <a href="#"><i class="nav-icon fas fa-save" title="Simpan"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-print" title="Cetak"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-trash" title="Hapus"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>FEBRUARI</td>
                            <td>2021</td>
                            <td>Rp. 155.000</td>
                            <td>
                              <a href="aksi_status.php?id=<?php echo $d['nisn'];?>" type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter">BELUM LUNAS</a>
                            </td>
                            <td>
                              <a href="#"><i class="nav-icon fas fa-save" title="Simpan"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-print" title="Cetak"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-trash" title="Hapus"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>FEBRUARI</td>
                            <td>2021</td>
                            <td>Rp. 155.000</td>
                            <td>
                              <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter">BELUM LUNAS</button>
                            </td>
                            <td>
                              <a href="#"><i class="nav-icon fas fa-save" title="Simpan"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-print" title="Cetak"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-trash" title="Hapus"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>FEBRUARI</td>
                            <td>2021</td>
                            <td>Rp. 155.000</td>
                            <td>
                              <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter">BELUM LUNAS</button>
                            </td>
                            <td>
                              <a href="#"><i class="nav-icon fas fa-save" title="Simpan"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-print" title="Cetak"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-trash" title="Hapus"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>FEBRUARI</td>
                            <td>2021</td>
                            <td>Rp. 155.000</td>
                            <td>
                              <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter">BELUM LUNAS</button>
                            </td>
                            <td>
                              <a href="#"><i class="nav-icon fas fa-save" title="Simpan"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-print" title="Cetak"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-trash" title="Hapus"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>FEBRUARI</td>
                            <td>2021</td>
                            <td>Rp. 155.000</td>
                            <td>
                              <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter">BELUM LUNAS</button>
                            </td>
                            <td>
                              <a href="#"><i class="nav-icon fas fa-save" title="Simpan"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-print" title="Cetak"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-trash" title="Hapus"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>FEBRUARI</td>
                            <td>2021</td>
                            <td>Rp. 155.000</td>
                            <td>
                              <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter">BELUM LUNAS</button>
                            </td>
                            <td>
                              <a href="#"><i class="nav-icon fas fa-save" title="Simpan"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-print" title="Cetak"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-trash" title="Hapus"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>FEBRUARI</td>
                            <td>2021</td>
                            <td>Rp. 155.000</td>
                            <td>
                              <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter">BELUM LUNAS</button>
                            </td>
                            <td>
                              <a href="#"><i class="nav-icon fas fa-save" title="Simpan"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-print" title="Cetak"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-trash" title="Hapus"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>FEBRUARI</td>
                            <td>2021</td>
                            <td>Rp. 155.000</td>
                            <td>
                              <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter">BELUM LUNAS</button>
                            </td>
                            <td>
                              <a href="#"><i class="nav-icon fas fa-save" title="Simpan"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-print" title="Cetak"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-trash" title="Hapus"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>FEBRUARI</td>
                            <td>2021</td>
                            <td>Rp. 155.000</td>
                            <td>
                              <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter">BELUM LUNAS</button>
                            </td>
                            <td>
                              <a href="#"><i class="nav-icon fas fa-save" title="Simpan"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-print" title="Cetak"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-trash" title="Hapus"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>FEBRUARI</td>
                            <td>2021</td>
                            <td>Rp. 155.000</td>
                            <td>
                              <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter">BELUM LUNAS</button>
                            </td>
                            <td>
                              <a href="#"><i class="nav-icon fas fa-save" title="Simpan"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-print" title="Cetak"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-trash" title="Hapus"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>FEBRUARI</td>
                            <td>2021</td>
                            <td>Rp. 155.000</td>
                            <td>
                              <form method="POST" action="aksi_status.php?id=<?php echo $d['nisn'];?>" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="nisn" value="<?php echo $d['nisn'] ?>">
                                <input type="hidden" name="spp" value="Dikirim">
                                <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter">BELUM LUNAS</button>
                              </form>
                            </td>
                            <td>
                              <a href="#"><i class="nav-icon fas fa-save" title="Simpan"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-print" title="Cetak"></i></a>
                              <a>|</a>
                              <a href="#"><i class="nav-icon fas fa-trash" title="Hapus"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
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
    var nama = $(this).data('nama');

    $("#tampil_modal #nisn").text(nisn);
    $("#tampil_modal #id_kelas").text(id_kelas);
    $("#tampil_modal #nama").text(nama);

  })        
</script>
<script type="text/javascript">
  function klik(){
    const icon = document.getElementById("tombol");
    if(icon.style.color == "black"){
      icon.style.color = "red";
    }else{
      icon.style.color = "black";
    }
  }
</script>