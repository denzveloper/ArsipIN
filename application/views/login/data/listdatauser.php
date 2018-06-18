			    <h3 class="panel-title"><i class="fas fa-file-alt"></i> Daftar Laporan Oleh <b><?php echo $this->dataio->getwho($this->input->get("usr", TRUE))->nama_user; ?></b></h3>
			  </div>
			  <div class="panel-body">
			    <h4>Daftar Data Berdasarkan Tahun</h4>
			    	<?php $list=$this->dataio->viewmin(array('username' => $this->input->get("usr", TRUE))); if($list != FALSE){foreach($list as $lst){ ?>
			    	<p><?php echo $lst->tahun; ?></p>
			    	<?php } } ?>
			    <h4>5 Daftar Data Terbaru</h4>
			    	<?php $list=$this->dataio->viewmin(array('username' => $this->input->get("usr", TRUE))); if($list != FALSE){foreach($list as $lst){ ?>
			    	<p><?php echo $lst->tahun; ?></p>
			    	<?php } } ?>
			  </div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('/style/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/js/passho.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/js/bootstrap.min.js');?>"></script>
</body>
</html>