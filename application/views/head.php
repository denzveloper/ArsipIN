<!DOCTYPE html>
<html>
<head>
	<title> Dashboard - ArsipIN v[ALPHA]</title>
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url('style/img/root.png');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/fontawesome-all.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/main.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/styles.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css');?>">
</head>
<body onpaste="return false;" oncopy="return false;">
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand imgs" href="<?php echo base_url('index.php/tentang'); ?>" id="showabout" style="cursor: help;">ArsipIN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="navbar-form navbar-right">
                <a href="<?php echo base_url('index.php/dashboard/logout') ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
      </div>
    </nav>
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
              <a href="#" class="list-group-item active" style="text-align: center;background-color: #0099ff;border-color: #ddd">
              <i class="fas fa-bars"></i> MENU
              </a>
              <a href="<?php echo base_url('index.php/dashboard'); ?>" class="list-group-item"><i class="fas fa-home"></i> Dashboard</a>
              <?php if($this->session->userdata("level") == 1){ ?>
              <a href="<?php echo base_url('index.php/data'); ?>" class="list-group-item"><i class="far fa-file"></i> Buat Data Laporan</a>
              <a href="<?php echo base_url('index.php/edit'); ?>" class="list-group-item"><i class="fas fa-edit"></i> Edit Data Laporan</a>
              <?php }elseif($this->session->userdata("level") == 0){ ?>
              <a href="<?php echo base_url('index.php/showdata'); ?>" class="list-group-item"><i class="fas fa-file"></i> Lihat Data Laporan</a>
              <a href="<?php echo base_url('index.php/chart'); ?>" class="list-group-item"><i class="fas fa-chart-pie"></i> Lihat Chart</a>
              <a href="<?php echo base_url('index.php/generate'); ?>" class="list-group-item"><i class="fas fa-qrcode"></i> Lihat Kode Verifikasi</a>
              <a href="<?php echo base_url('index.php/uman'); ?>" class="list-group-item"><i class="fas fa-users"></i> Manajer Pengguna</a>
              <?php }else{ echo "ERR:User Not Acceptable!"; exit;} ?>
              <a href="<?php echo base_url('index.php/edituser'); ?>" class="list-group-item"><i class="fas fa-id-card-alt"></i> Edit Akun</a>
              <a href="<?php echo base_url('index.php/dashboard/logout'); ?>" class="list-group-item"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading">