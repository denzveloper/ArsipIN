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
<body>
<div class="cloud cloudAnimate"></div>
<div class="container" style="position: relative;">
    <div class="rowlogin">
            <?php if(isset($error)) { echo $error; }; ?>
                <form class="form-signin" method="POST" action="<?php echo base_url('index.php/login') ?>">
                <div class="loginer eff">
                <h3 class="text-center login-title dpntxt"><img class="featurette-image img-responsive center-block" src="<?php echo base_url('/style/img/index.png');?>" width="224px" />Log Masuk Akun ArsipIN</h3>
                </br>
                <div class="form-group">
                    <input type="text" class="form-user form eff" name="username" placeholder="Nama Pengguna" autofocus required autocomplete="off">
                    <?php echo form_error('username'); ?>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-user form eff" placeholder="Kata Sandi" required autocomplete="off">
                    <?php echo form_error('password'); ?>
                </div>

                <button class="butn eff" name="btn-login" id="btn-login" type="submit">
                    Masuk</button>
                </label>
                </form>
                </br></br>
                <a href="<?php echo base_url('index.php/register');?>" class="text-center crt">Buat Akun Baru</a>
            </div>
            <div id="error" style="margin-top: 10px"></div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url('/style/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/js/jquery.validate.min.js');?>"></script>
</body>
</html>
