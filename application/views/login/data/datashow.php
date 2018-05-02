			    <h3 class="panel-title"><i class="fas fa-file-alt"></i> Data Laporan</h3>
			  </div>
			  <div class="panel-body">
			  	<h3>Daftar Data</h3>
				<select class="selectpicker" data-live-search="true" data-style="btn-primary">
					<optgroup label="Lembaga / Nama Pengguna">
					<?php $i=0; if($list != FALSE){foreach($list as $lst){ $i++; ?>
					  	<option value="<?php echo $lst->username;?>"><?php echo $lst->place."<b> / </b>".$lst->nama_user;?></option>
					<?php } } ?>
				</select>
				<hr>
			  	<h3>Data Terbaru</h3>
			  	<div class="table-responsive">
				    <table class="table table-striped table-hover">
				    	<thead>
				    		<tr>
				    			<th>No</th>
				    			<th>Laporan Desa/Lembaga</th>
				    			<th>Disusun Oleh</th>
				    			<th>Dibuat Pada</th>
				    			<th>Lap. Thn.</th>
				    			<th>Sudah Dilihat?</th>
				    			<th>Aksi</th>
				    		</tr>
				    	</thead>
				    	<tbody>
				    		<?php $i=0; if($new != FALSE){foreach($new as $lst){ $i++; ?>
				    		<tr>
				    			<td><?php echo $i; ?></td>
				    			<td><?php echo $this->dataio->getwho($lst->username)->place;?></td>
				    			<td><?php echo $this->dataio->getwho($lst->username)->nama_user;?></td>
				    			<td><?php echo $lst->date;?></td>
				    			<td><?php echo $lst->tahun;?></td>
				    			<td><?php if ($lst->dibaca==1) {
				    						echo "<span style='color: #2ED1A2'><i class='fas fa-check-circle'></i> Sudah</span>";
				    					}else{
				    						echo "<span style='color: #ff6347'><i class='fas fa-times-circle'></i> Belum</span>";
				    					} ?></td>
				    			<td><a href="<?php echo base_url('index.php/data/show?usr='); echo $this->safe->convert($lst->username,$this->session->userdata('namaus')).'&dat='.$lst->date;?>"><button class="btn btn-default btn-sm"><i class="fas fa-folder-open"></i> Lihat Data</button></a></td>
				    		</tr>
				    		<?php } }else{ echo "<tr><td colspan='6' align='center'> <b><i>*NO USER TO SHOW*</i></b> </td></tr>"; } ?>
				    	</tbody>
				    </table>
				</div>
			  </div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('/style/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/js/passho.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/js/bootstrap-select.js');?>"></script>
</body>
</html>