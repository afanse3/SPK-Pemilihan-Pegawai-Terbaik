<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Perhitungan SPK</title>

  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/adminlte.min.css')?>">
  <!-- pace-progress -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/pace-progress/themes/black/pace-theme-flash.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="<?php echo base_url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')?>" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')?>">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse pace-teal pace-theme-flash-teal">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="beranda" class="brand-link">
      <img src="assets/img/avatar-bisnis.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SPK Pegawai Terbaik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar sidebar-dark-teal">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/img/jenderal.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="Beranda" class="d-block"><?php echo $this->session->userdata('username'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
          <li class="nav-item">
           <a href="beranda" class="nav-link">
            <i class="fas fa-home"></i>
             <p>Beranda</p>
           </a>
          </li>
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link">
                <i class="fas fa-list"></i>
                  <p>Data Kriteria
                  <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="Kriteria" class="nav-link">
                    <i class="fas fa-weight-hanging"></i>
                    <p>Bobot Kriteria</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="Masternilai" class="nav-link">
                    <i class="fas fa-chart-area"></i>
                    <p>Nilai Sub Kriteria</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="Pegawai" class="nav-link">
                <i class="fas fa-users"></i>
                <p>Daftar Pegawai</p>
              </a>
            </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="fas fa-calculator"></i>
              <p>Perhitungan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Auth/logout" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Perhitungan SPK</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
              <li class="breadcrumb-item active">Perhitungan SPK</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->                      

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-teal card-outline">
              <div class="card-header">
                <h5 class="m-0">Data Penilaian Pegawai</h5>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Pegawai</th>
                      <th>C1</th>
                      <th>C2</th>
                      <th>C3</th>
                      <th>C4</th>
                      <th>C5</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach ($data_pegawai as $value) :
                      $data_nilai = $this->db->query("SELECT * FROM v_nilai WHERE id_pegawai = '$value->id_pegawai'")->result();
                    ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value->nama_pegawai ?></td>
                        <?php 
                            foreach ($data_nilai as $value2) { ?>
                              <td>
                                <?= $value2->nama_nilai; ?>
                              </td>
                        <?php } ?>
                      </tr>
                    <?php endforeach ?>
                    </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
          </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <!-- /.content -->
      <br>
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-teal card-outline">
              <div class="card-header">
                <h5 class="m-0">Nilai dari Data Pegawai</h5>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Pegawai</th>
                      <th>C1</th>
                      <th>C2</th>
                      <th>C3</th>
                      <th>C4</th>
                      <th>C5</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no2 = 1;
                    foreach ($data_pegawai as $value) :
                      $data_nilai = $this->db->query("SELECT * FROM v_nilai WHERE id_pegawai = '$value->id_pegawai'")->result();
                    ?>
                      <tr>
                        <td><?= $no2++; ?></td>
                        <td><?= $value->nama_pegawai ?></td>
                        <?php 
                            foreach ($data_nilai as $value2) { ?>
                              <td>
                                <?= $value2->nilai; ?>
                              </td>
                        <?php } ?>
                      </tr>
                    <?php endforeach ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th>Min/Max</th>
                        <th>
                          <?= $c1_max = $this->db->query("SELECT MAX(nilai) as nilai FROM v_nilai WHERE id_kriteria = '1'")->row()->nilai; ?> 
                        </th>
                        <th><?= $c2_max = $this->db->query("SELECT MAX(nilai) as nilai FROM v_nilai WHERE id_kriteria = '2'")->row()->nilai; ?></th>
                        <th><?= $c3_max = $this->db->query("SELECT MAX(nilai) as nilai FROM v_nilai WHERE id_kriteria = '3'")->row()->nilai; ?></th>
                        <th><?= $c4_min = $this->db->query("SELECT MIN(nilai) as nilai FROM v_nilai WHERE id_kriteria = '4'")->row()->nilai; ?></th>
                        <th><?= $c5_min = $this->db->query("SELECT MIN(nilai) as nilai FROM v_nilai WHERE id_kriteria = '5'")->row()->nilai; ?></th>
                    </tr>
                    </tfoot>
                  </table>
              </div>
              <!-- /.card-body -->
          </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <br>
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-teal card-outline">
            <div class="card-header">
              <h5 class="m-0">Hasil Perhitungan Normalisasi</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Pegawai</th>
                      <th>C1</th>
                      <th>C2</th>
                      <th>C3</th>
                      <th>C4</th>
                      <th>C5</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no3 = 1; 
                        foreach ($data_pegawai as $value3) :
                      ?>
                      <tr>
                        <td><?= $no3++; ?></td>
                        <td><?= $value3->nama_pegawai ?></td>
                        <?php
                          $data_nilai2 = $this->db->query("SELECT * FROM v_nilai WHERE id_pegawai = '$value3->id_pegawai'")->result();
                          foreach ($data_nilai2 as $value4) {
                            $data_max_nilai = $this->db->query("SELECT MAX(nilai) as nilai FROM v_nilai WHERE id_kriteria = '$value4->id_kriteria'")->row();
                            $data_min_nilai = $this->db->query("SELECT MIN(nilai) as nilai FROM v_nilai WHERE id_kriteria = '$value4->id_kriteria'")->row();
                        ?>
                          <td>
                            <?php 
                              if ($value4->atribut == "Benefit") {
                                echo number_format((float)$value4->nilai/$data_max_nilai->nilai, 2, '.','');
                              } else if ($value4->atribut == 'Cost') {
                                echo number_format((float)$data_min_nilai->nilai/$value4->nilai, 2, '.','');
                              }
                            ?>
                          </td>
                        <?php } ?>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
            </div>
            <!-- /.card-body -->
        </div>
      <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <div class="col-lg-12">
          <div class="card card-teal card-outline">
            <div class="card-header">
              <h5 class="m-0">Nilai Ranking dari Normalisasi</h5>
            </div>
            <div class="card-body">
              <table id="tabelPerhitungan" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Pegawai</th>
                  <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  $no4 = 1;
                  foreach ($data_pegawai as $value5) :
                ?>
                  <tr>
                    <td><?= $no4++; ?></td>
                    <td><?= $value5->nama_pegawai ?></td>
                    <?php
                     $data_nilai3 = $this->db->query("SELECT * FROM v_nilai WHERE id_pegawai = '$value5->id_pegawai'")->result();
                     $total = 0;
                     foreach ($data_nilai3 as $value6) {
                      $data_max_nilai2 = $this->db->query("SELECT MAX(nilai) as nilai FROM v_nilai WHERE id_kriteria = '$value6->id_kriteria'")->row();
                      $data_min_nilai2 = $this->db->query("SELECT MIN(nilai) as nilai FROM v_nilai WHERE id_kriteria = '$value6->id_kriteria'")->row();
                      $bobot = $this->db->query("SELECT bobot FROM v_nilai WHERE id_kriteria = '$value6->id_kriteria'")->row();
                      
                      if ($value6->atribut == 'Benefit') {
                        $nilai_bobot = $value6->nilai/$data_max_nilai2->nilai*$bobot->bobot;
                      } else if ($value6->atribut == 'Cost') {
                        $nilai_bobot = $data_min_nilai2->nilai/$value6->nilai*$bobot->bobot;
                      }
                      $total += $nilai_bobot;
                      } ?>
                      <td>
                        <?= number_format((float)$total, 2, '.',''); ?>
                      </td>
                  </tr>
                <?php endforeach ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
        </div>
      <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    </div>
  <!-- /.content-wrapper -->
  </div>
  </div>
  <!-- Control Sidebar -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Hak Cipta &copy; 2020 </strong>Arfandi Ahmad untuk Jenderal Software
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/js/adminlte.min.js')?>"></script>
<!-- pace-progress -->
<script src="<?php echo base_url('assets/plugins/pace-progress/pace.min.js')?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')?>"></script>


<script>
$(document).ready(function() {
    $('#tabelPerhitungan').DataTable( {
        "order": [[2, "desc"]],
        "language": {
            "lengthMenu":   "Tampilkan entri per halaman _MENU_",
            "zeroRecords":  "Maaf entri tidak ditemukan",
            "info":         "Tampilkan halaman _PAGE_ dari _PAGES_",
            "infoEmpty":    "Entri tidak ditemukan",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search":       "Cari:",
            "paginate": {
            "first":       "Pertama",
            "previous":    "Sebelumnya",
            "next":        "Selanjutnya",
            "last":        "Terakhir"
          },
          "responsive": "true",
          "lengthMenu": ""
        }
    } );
} );
</script>

</body>
</html>
