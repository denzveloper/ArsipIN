<html>
<head>
	<title>Registrasi Baru - ArsipIN [BETA]</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('style/img/root.png');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/bootstrap.min.css');?>">
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
<body>
<div class="container">
    <div class="rowlogin">
            <?php if(isset($error)) { echo $error; }; ?>
                <form class="form-signin" method="POST" action="<?php echo base_url('index.php/register') ?>">
                <div class="loginer eff">
                <h3 class="text-center login-title dpntxt"><img class="featurette-image img-responsive center-block" src="<?php echo base_url('/style/img/root.png');?>" width="100px" />Registrasi Akun ArsipIN</h3>
                </br>
                <div class="form-group">
                    <input type="text" class="form-user form eff" name="username" placeholder="Nama Pengguna" autofocus autocomplete="off">
                    <?php echo form_error('username'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-user form eff" name="realname" placeholder="Nama Anda" autofocus autocomplete="off">
                    <?php echo form_error('realname'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-user form eff" name="phone" placeholder="Nomor Telepon" required autocomplete="off">
                    <?php echo form_error('phone'); ?>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-user form eff" placeholder="Kata Sandi" required autocomplete="off">
                    <?php echo form_error('password'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-user form eff" name="kode" placeholder="Kode Verifikasi" required autocomplete="off">
                    <?php echo form_error('kode'); ?>
                </div>

                <button class="butn eff" name="btn-newuser" id="btn-login" type="submit">
                    Daftar</button>
                </label>
                </form>
                </br></br>
                <a href="<?php echo base_url('index.php/login');?>" class="text-center crt">Sudah Memiliki Akun?</a>
            </div>
            <div id="error" style="margin-top: 10px"></div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url('/style/css/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/css/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/css/js/jquery.validate.min.js');?>"></script>
</body>
</html>
