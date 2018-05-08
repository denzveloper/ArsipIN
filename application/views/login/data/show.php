			    <h3 class="panel-title"><i class="fas fa-file-alt"></i> Lihat Data Laporan "<?php echo $this->safe->convert($this->input->get("usr", TRUE),$this->session->userdata('namaus'));?>"</h3>
			  </div>
			  <div class="panel-body">
			  	<h4>Dibuat: <?php echo date("H:i:s D, d F Y", strtotime($this->input->get("dat", TRUE))); ?></h4>
			    <?php if($doc != FALSE){foreach($doc as $fill){ ?>
				<table>
					<tr>
						<td><?php echo $fill->username; ?></td>
					</tr>
					<tr>
						<td><?php echo $fill->dibaca; ?></td>
					</tr>
					<tr>
						<td><?php echo $fill->date; ?></td>
					</tr>
					<tr>
						<td><?php echo $fill->tahun; ?></td>
					</tr>
					<tr>
						<td><?php echo $fill->seni_daerah; ?></td>
					</tr>
					<tr>
						<td><?php echo $fill->tgl_waktu; ?></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
					</tr>
				</table>

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