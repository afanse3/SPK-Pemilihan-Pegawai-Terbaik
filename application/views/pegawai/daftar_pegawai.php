<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Daftar Pegawai</title>

  <!-- Font Awesome Icons -->
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
          <a href="beranda" class="d-block"><?php echo $this->session->userdata('username'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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
              <a href="#" class="nav-link active">
                <i class="fas fa-users"></i>
                <p>Daftar Pegawai</p>
              </a>
            </li>  
          <li class="nav-item">
            <a href="Perhitungan" class="nav-link">
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
            <h1 class="m-0 text-dark">Daftar Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
              <li class="breadcrumb-item active">Daftar Pegawai</li>
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
                <button type="button" class="btn btn-success" data-toggle="modal" data-target=#modal-pegawai>
                  <i class="far fa-plus-square"></i> Tambah
              </div>
              <div class="card-body">
              <?php if($this->session->flashdata("tambah_pegawai") == TRUE): ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i> <?= $this->session->flashdata("tambah_pegawai");?>
                </div>
              <?php endif; ?>
              <?php if($this->session->flashdata("edit_pegawai") == TRUE): ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i> <?= $this->session->flashdata("edit_pegawai");?>
                </div>
              <?php endif; ?>
              <?php if($this->session->flashdata("hapus_pegawai") == TRUE): ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i> <?= $this->session->flashdata("hapus_pegawai");?>
                </div>
              <?php endif; ?>
                <table id="testTable" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Pegawai</th>
                    <th>Pekerjaan</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if( ! empty($pegawai)){
                    foreach($pegawai as $data){
                      echo "<tr>
                      <td>".$data->id_pegawai."</td>
                      <td>".$data->nama_pegawai."</td>
                      <td>".$data->pekerjaan."</td>
                      <td class='text-center'>
                        <a href='".base_url("pegawai/ubah/".$data->id_pegawai)."'>
                        <button type='button' class='btn btn-warning btn-sm'>
                          <i class='fas fa-edit'></i> Edit
                        </button></a>
                        <a href='".base_url("pegawai/hapus/".$data->id_pegawai)."' onClick='javascript:return confirm(\"Apa Anda ingin menghapus data ini?\")'>
                        <button type='button' class='btn btn-danger btn-sm'>
                          <i class='far fa-trash-alt'></i> Hapus
                        </button></a>
                      </td>
                    </tr>";
                    }
                  }else{
                    echo "<tr><td align='center'>Tidak ada data.</td></tr>";
                  }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
          </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <br>
        <h3>Data Pegawai + Penilaian</h3>
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-teal card-outline">
              <div class="card-body">
              <?php if($this->session->flashdata("tambah_penilaian") == TRUE): ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i> <?= $this->session->flashdata("tambah_penilaian");?>
                </div>
              <?php endif; ?>
              <?php if($this->session->flashdata("hapus_penilaian") == TRUE): ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i> <?= $this->session->flashdata("hapus_penilaian");?>
                </div>
              <?php endif; ?>
                <table id="testTable2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Pegawai</th>
                    <th>Pekerjaan</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if( ! empty($pegawai)){
                    foreach($pegawai as $data){
                      echo "<tr>
                      <td>".$data->id_pegawai."</td>
                      <td>".$data->nama_pegawai."</td>
                      <td>".$data->pekerjaan."</td>
                      <td class='text-center'>
                        <a href='".base_url("nilai/nilai/".$data->id_pegawai)."'>
                        <button type='button' class='btn btn-primary btn-sm'>
                      <i class='fas fa-chart-area'></i> Nilai
                        </button></a>
                        <a href='".base_url("nilai/hapus/".$data->id_pegawai)."' onClick='javascript:return confirm(\"Apa Anda ingin menghapus penilaian ini?\")'>
                        <button type='button' class='btn btn-danger btn-sm'>
                      <i class='far fa-trash-alt'></i> Hapus Nilai
                        </button></a>
                      </td>
                    </tr>";
                    }
                  }else{
                    echo "<tr><td align='center'>Data tidak ada.</td></tr>";
                  }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
          </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <br>
    </div>
  <!-- /.content-wrapper -->
  </div>
  </div>
  <!-- Control Sidebar -->
  <div class="modal fade" id="modal-pegawai">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Pegawai</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php echo form_open("pegawai/tambah"); ?>
        <div class="modal-body">
          <div class="form-group">
            <label for="namaPegawai">Nama Pegawai*</label>
            <input type="text" class="form-control" name="input_nama_pegawai" placeholder="Masukkan nama pegawai..." value="<?php echo set_value('input_nama_pegawai'); ?>" required>
          </div>
          <div class="form-group">
            <label for="pekerjaan">Pekerjaan*</label>
            <input type="text" class="form-control" name="input_pekerjaan" placeholder="Masukkan pekerjaan pegawai..." value="<?php echo set_value('input_pekerjaan'); ?>" required>
          </div>
        </div>
      <div class="modal-footer justify-content-between">
      <a href="<?php echo base_url('pegawai'); ?>"><button type="button" value="Batal" class="btn btn-danger">Batal</button></a>
        <button type="submit" name="submit" value="Simpan" class="btn btn-primary">Tambah</button>
        </div>
        </div>
        <?php echo form_close(); ?>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Hak Cipta &copy; 2020 </strong>Arfandi Ahmad untuk Jenderal Software
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
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
    $('#testTable').DataTable( {
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
          "order": [[3, "desc"]],
          "responsive": "true",
          "lengthMenu": ""
        }
    } );
} );

$(document).ready(function() {
    $('#testTable2').DataTable( {
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
          "order": [[3, "desc"], [0, 'asc']],
          "responsive": "true",
          "lengthMenu": ""
        }
    } );
} );
</script>

</body>
</html>
