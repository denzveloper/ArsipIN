<!DOCTYPE html>
<html>
<head>
	<title> Dashboard - ArsipIN</title>
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url('style/img/root.png');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/font-awesome.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/main.css');?>">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand imgs" href="#">ArsipIN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        	<div class="navbar-form navbar-right">
				<a href="<?php echo base_url('index.php/dashboard/logout') ?>" type="submit" class="btn btn-danger"><i class="fa fa-sign-out"></i> Logout</a>
        	</div>
      </div>
    </nav>
<div class="container" style="margin-top: 80px">
	<div class="row">
		<div class="col-md-3">
			<div class="list-group">
			  <a href="#" class="list-group-item active" style="text-align: center;background-color: #0099ff;border-color: #ddd">
			  <i class="fa fa-tasks"></i> MENU
			  </a>
			  <a href="<?php echo base_url('index.php/dashboard'); ?>" class="list-group-item"><i class="fa fa-dashboard"></i> Dashboard</a>
			  <?php if($this->session->userdata("level") == 1){ ?>
			  <a href="<?php echo base_url('index.php/data'); ?>" class="list-group-item"><i class="fa fa-file"></i> Buat Data Laporan</a>
			  <?php }elseif($this->session->userdata("level") == 0){ ?>
			  <a href="<?php echo base_url('index.php/showdata'); ?>" class="list-group-item"><i class="fa fa-file"></i> Lihat Data Laporan</a>
			  <a href="<?php echo base_url('index.php/chart'); ?>" class="list-group-item"><i class="fa fa-bullhorn"></i> Lihat Chart</a>
			  <a href="<?php echo base_url('index.php/generate'); ?>" class="list-group-item"><i class="fa fa-qrcode"></i> Lihat Kode Verifikasi</a>
			  <?php }else{ echo "ERR:User Not Acceptable!";} ?>
			  <a href="<?php echo base_url('index.php/edituser'); ?>" class="list-group-item"><i class="fa fa-drivers-license-o"></i> Edit User</a>
			  <a href="<?php echo base_url('index.php/dashboard/logout'); ?>" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title"><i class="fa fa-bullhorn"></i> Welcome Message</h3>
			  </div>
			  <div class="panel-body">
			    Selamat Datang <b><?php echo $this->session->userdata("user_nama"); ?></b> dihalaman Dashboard Aplikasi <b>ArsipIN</b>!
			  </div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('/style/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/js/bootstrap.min.js');?>"></script>
</body>
</html>