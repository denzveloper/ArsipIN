                <h3 class="panel-title"><i class="fa fa-drivers-license-o"></i> Edit User <b><?php echo $this->session->userdata('uname')?></b></h3>
              </div>
              <div class="panel-body">
                <p><b>Last Edited: </b><i><?php echo date("D, d F Y (H:i)", strtotime($this->session->userdata('edit')));?></i></p>
                <?php if(isset($error)) { echo $error; }; ?>
			  	<form method="POST" action="<?php echo base_url('index.php/edituser') ?>">
			     <div class="form-group">
                    <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-user"></i></span>
                     <input type="text" class="form-control" name="username" placeholder="Nama Pengguna" autocomplete="off" value="<?php echo $this->session->userdata('uname');?>" disabled>
                    </div>
                    <?php echo form_error('username'); if($user_data != FALSE){foreach($user_data as $post){ ?>
                 </div>
                 <div class="form-group">
                    <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-font"></i></span>
                     <input type="text" class="form-control" name="realname" placeholder="Nama Anda" autocomplete="off" value="<?php echo $post->nama_user; ?>">
                    </div>
                    <?php echo form_error('realname'); ?>
                 </div>
                 <?php if($this->session->userdata("level") == 1){?>
                 <div class="form-group">
                    <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                     <input type="text" class="form-control" name="jabat" placeholder="Jabatan Anda" autocomplete="off" value="<?php echo $post->jabatan;?>">
                    </div>
                    <?php echo form_error('jabat'); ?>
                 </div>
                 <div class="form-group">
                    <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-building"></i></span>
                     <input type="text" class="form-control" name="whois" placeholder="Nama Lembaga/Desa" autocomplete="off" value="<?php echo $post->place; ?>">
                    </div>
                    <?php echo form_error('whois'); ?>
                 </div>
                 <?php } ?>
                 <div class="form-group">
                    <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-phone-square"></i></span><input type="text" class="form-control" name="phone" placeholder="Nomor Telepon" required autocomplete="off" value="<?php echo $post->phone; ?>" onkeypress="return hanyaAngka(event)">
                    </div>
                    <?php echo form_error('phone'); ?>
                 </div>
                 <div class="form-group">
                    <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span><input type="password" name="password" id="pwd" class="form-control" placeholder="Kata Sandi" required autocomplete="off" value="<?php echo $this->safe->convert($post->password,$this->session->userdata('uname'));?>">
                     <span class="input-group-addon" id="latar" title="Show Password" class="eff"><button id="show" type="button" style="background: transparent; border: 0;" class="eff"><i class="fa fa-eye"></i></button></span>
                    </div>
                    <?php echo form_error('password'); ?>
                 </div>
                 <div class="row">
                  <div class="col-lg-2">
                	 <button class="btn btn-success btn-block" name="btn-update" id="btn-update" type="submit" onclick="return confirm('Anda akan di-logout jika melanjutkan, dan masuk dengan akun yang diperbarui. Yakin?')">
                    Simpan</button>
                  </div>
                  <div class="col-lg-2">
                    <button class="btn btn-warning btn-block" name="btn-batal" id="btn-batal" type="reset">
                    Atur Ulang</button>
                  </div>
                 </div>
                </form>
			       </div>
			    </div>
		    </div>
	   </div>
  </div>
<script type="text/javascript" src="<?php echo base_url('/style/css/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/css/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/js/passho.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/css/js/jquery.validate.min.js');?>"></script>
<?php } }else{}?>
</body>
</html>