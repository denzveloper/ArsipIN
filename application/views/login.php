<html>
<head>
	<title>Login - ArsipIN [BETA]</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('style/img/root.png');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/css/styles.css');?>" rel="stylesheet">
    <style type="text/css">
    .bgdif{
        background-color: #5294E2;
        color: #fff;
    }
    .bgdiff{
        background-color: #fff;
        color: #5294E2;
    }
    .cloud{
        position: absolute;
        top: 12%;
        left: 0;
        right: 0;
        height: 200px;
        background: url(<?php echo base_url('/style/img/cloud.png');?>) top center repeat-x;
        background-size: cover;
    }
    .cloudAnimate{
        -webkit-animation-name: cloudAnimate;
        -webkit-animation-duration: 150s;
        -webkit-transform-origin: 10% 10%;
        -webkit-animation-iteration-count: infinite;
        -webkit-animation-timing-function: linear;
    }
    @-webkit-keyframes cloudAnimate {
        0%   {background-position: 0 0;}
        100%   {background-position: 10000px 0;}
    }

    body{
     background: #33ccaa;
     color: #555;
    }
    </style>
</head>
<body onpaste="return false;" oncopy="return false;">
<div class="cloud cloudAnimate"></div>
<div class="container" style="position: relative;">
    <div id="shd" class="rowlogin">
        <form class="form-signin" method="POST" action="<?php echo base_url('index.php/login') ?>">
            <div class="loginer eff">
            <img class="featurette-image img-responsive " src="<?php echo base_url('/style/img/index.png');?>" width="128px" />
            <h3 class="login-title dpntxt">Log Masuk</h3>
            <p>Log Masuk dengan Akun yang telah Anda buat.</p>
            </br>
            <?php if(isset($error)) { echo $error; }; ?>
            <div class="form-group">
                <input type="text" class="form-user form eff" name="username" placeholder="Nama Pengguna" required autocomplete="off">
                <?php echo form_error('username'); ?>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-user form eff" placeholder="Kata Sandi" required autocomplete="off">
                <?php echo form_error('password'); ?>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-8">
                    <a href="<?php echo base_url('index.php/register');?>" class="text-center crt">Buat Akun Baru</a>
                </div>
                <div class="col-sm-3">
                    <button class="butn eff" name="btn-login" id="btn-login" type="submit">Masuk</button>
                </div>
            </div>
        </form>
        </br></br>
        
    </div>
    <div id="error" style="margin-top: 10px"></div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url('/style/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/js/jquery.validate.min.js');?>"></script>
</body>
</html>
