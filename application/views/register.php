<html>
<head>
	<title>Registrasi Baru - ArsipIN [BETA]</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('style/img/root.png');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/fontawesome-all.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/styles.css');?>">
    <style type="text/css">
    .bgdif{
        background-color: #5294E2;
        color: #fff;
    }
    .bgdiff{
        background-color: #fff;
        color: #5294E2;
    }
    @-webkit-keyframes blink {
        0%  { background: #0099ff; }
        25% { background: #0099ff; }
        50% { background: #777;}
        75% { background: #33cc99; }
        100%{ background: #0099ff; }
    }
    @-moz-keyframes blink {
        0%  { background: #0099ff; }
        25% { background: #0099ff; }
        50% { background: #777;}
        75% { background: #33cc99; }
        100%{ background: #0099ff; }
    }
    @-ms-keyframes blink {
        0%  { background: #0099ff; }
        25% { background: #0099ff; }
        50% { background: #777;}
        75% { background: #33cc99; }
        100%{ background: #0099ff; }
    }
    body{
     -webkit-animation: blink 90s infinite;
     -moz-animation:    blink 90s infinite;
     -ms-animation:     blink 90s infinite;
     color: #555;
    }
    </style>
</head>
<body onpaste="return false;" oncopy="return false;">
<div class="container">
    <div class="rowlogin">
        <form class="form-signin" method="POST" action="<?php echo base_url('index.php/register') ?>">
            <div class="loginer eff">
                <div class="row">
                    <div class="col-md-4">
                        <img class="featurette-image img-responsive" src="<?php echo base_url('/style/img/root.png');?>" width="98px" />
                    </div>
                    <div class="col-md-7" style="padding: 9px 0">
                        <h1>Registrasi</h1>
                    </div>
                </div>
                <h3 class="login-title dpntxt">Akun ArsipIN</h3>
                <p>Mendaftarkan Anda Akun Baru untuk ArsipIN</p>
                </br>
                <?php if(isset($error)) { echo $error; }; ?>
                <div class="form-group">
                    <input type="text" class="form-user form eff" name="username" placeholder="Nama Pengguna" required autocomplete="off">
                    <?php echo form_error('username'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-user form eff" name="realname" placeholder="Nama Anda" required autocomplete="off">
                    <?php echo form_error('realname'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-user form eff" name="jabat" placeholder="Jabatan Anda" required autocomplete="off">
                    <?php echo form_error('jabat'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-user form eff" name="phone" placeholder="Nomor Telepon" required autocomplete="off" onkeypress="return hanyaAngka(event)">
                    <?php echo form_error('phone'); ?>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-user form eff" placeholder="Kata Sandi" required autocomplete="off">
                    <?php echo form_error('password'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-user form eff" name="whois" placeholder="Lembaga/Nama Desa" required autocomplete="off">
                    <?php echo form_error('whois'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-user form eff" name="kode" placeholder="Kode Verifikasi" required autocomplete="off">
                    <?php echo form_error('kode'); ?>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-8">
                        <a href="<?php echo base_url('index.php/login');?>" class="text-center crt">Sudah Memiliki Akun?</a>
                    </div>
                    <div class="col-sm-3">
                        <button class="butn eff" name="btn-newuser" id="btn-login" type="submit">Daftar</button>
                    </div>
                </div>
            </div>
        </form>
    <div id="error" style="margin-top: 10px"></div>
</div>
<script type="text/javascript" src="<?php echo base_url('/style/css/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/css/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/js/passho.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/css/js/jquery.validate.min.js');?>"></script>
</body>
</html>
