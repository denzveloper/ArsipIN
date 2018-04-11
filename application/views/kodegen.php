			    <h3 class="panel-title"><i class="fa fa-qrcode"></i> Kode Verifikasi</h3>
			  </div>
			  <div class="panel-body">
			  	<div class="row">
                  <div class="col-lg-6">
			    	<form method="POST" action="<?php echo base_url('index.php/generate') ?>">
			        	<div class="form-group">
                    		<div class="input-group">
                     			<span class="input-group-addon"><i class="fa fa-qrcode"></i></span>
	                     		<input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Banyak kode Generate" autocomplete="off">
	                     		<span class="input-group-addon"><button style="background: transparent; border: 0;" name="btn-gen" id="btn-gen" type="submit">Generate</button></span>
                    		</div>
                            <p><i>*Demi kenyamanan, Maksimal 16 Kode per request.</i></p>
                    		<?php echo form_error('jumlah'); ?>
                 		</div>
                 	</form>
                  </div>
                </div>
                <table id="table_id" class="table table-striped table-hover">
                    <thead>
                    <tr><th>No.</th><th>List Kode Verifikasi</th></tr>
                    </thead>
                    <tbody>
                 		<?php $i=0; if($posts != FALSE){foreach($posts as $post){ $i++;?>
                     	<tr>
                            <td width="1"><?php echo $i;?></td>
                     		<td><i><b><?php echo $post->kodever; ?></b></i></td>
                     	</tr>
                     	<?php }}else{echo "<tr><td align='center'> <b><i>*NO CODE AVAIBLE*</i></b> </td></tr>";} ?>
                    </tbody>
                </table>
                <p><?php //echo $links; ?></p>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url('/style/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/datatables/DataTables-1.10.16/js/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/datatables/DataTables-1.10.16/js/dataTables.bootstrap.js');?>"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable({searching: false, "aLengthMenu": [[5, 7, 10, 20, -1], [5, 7, 10, 20, "All"]],
        "iDisplayLength": 5});
  } );
</script>
</body>
</html>