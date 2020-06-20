<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Edit Data Pegawai</title>

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
      <img src="../../assets/img/avatar-bisnis.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SPK Pegawai Terbaik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar sidebar-dark-teal">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../assets/img/jenderal.png" class="img-circle elevation-2" alt="User Image">
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
              <a href="#" class="nav-link active">
                <i class="fas fa-list"></i>
                  <p>Data Kriteria
                  <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="Kriteria" class="nav-link active">
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
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="beranda">Beranda</a></li>
              <li class="breadcrumb-item"><a href="Pegawai">Daftar Pegawai</a></li>
              <li class="breadcrumb-item active">Edit Data Pegawai</li>
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
          <div class="col-lg-6">
            <div class="card card-warning card-outline">
              <div class="card-header">
                <h5 class="m-0">Edit Data Pegawai</h5>
              </div>
              <div class="card-body">
              <?php echo form_open("pegawai/ubah/".$pegawai->id_pegawai); ?>
                  <div class="form-group">
                    <label for="edit_namaKriteria">ID Pegawai</label>
                    <input type="text" class="form-control" name="input_id_pegawai" value="<?php echo set_value('input_id_pegawai', $pegawai->id_pegawai); ?>" disabled>
                  </div>
                  <div class="form-group">
                      <label for="edit_namaKriteria">Nama Pegawai*</label>
                      <input type="text" class="form-control" name="input_nama_pegawai" value="<?php echo set_value('input_nama_pegawai', $pegawai->nama_pegawai); ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="edit_bobotKriteria">Pekerjaan*</label>
                      <input type="text" class="form-control" name="input_pekerjaan" value="<?php echo set_value('input_pekerjaan', $pegawai->pekerjaan); ?>" required>
                  </div>
              </div>
              <div class="card-footer">
              <a href="<?php echo base_url("pegawai"); ?>"><button type="button" value="Batal" class="btn btn-danger">Batal</button></a>
                <button type="submit" class="btn btn-primary" name="submit" value="Ubah">
                    Simpan
                </button>
              </div>
              <?php echo form_close(); ?>
              <!-- /.card-body -->
          </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
  </div>
  </div>

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

</body>
</html>
