			    <h3 class="panel-title"><i class="fa fa-users"></i> Manager Pengguna</h3>
			  </div>
			  <div class="panel-body">
                <?php if(isset($error)) { echo $error; }; ?>
                <table id="table_id" class="table table-striped table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr><th>No</th><th>Dibuat</><th>Nama Lengkap</th><th>Jabatan</th><th>No. Telepon</th><th>Lembaga</th><th>Login Terakhir</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                        <?php $i=0; if($user_data != FALSE){foreach($user_data as $post){ $i++;?>
                        <tr>
                            <td><i><?php echo $i; ?></i></td>
                            <td><?php echo $post->acccreate; ?></td>
                            <td><b><i><?php echo $post->nama_user; ?></i></b></td>
                            <td><?php echo $post->jabatan; ?></td>
                            <td><?php echo $post->phone; ?></td>
                            <td><?php echo $post->place; ?></td>
                            <td><?php echo $post->lastlog; ?></td>
                            <td>
                                <a href="<?php echo base_url('index.php/uman?reset='); echo $this->safe->convert($post->username,$this->session->userdata("user_name")); ?>" data-toggle="tooltip" title="Reset Sandi manjadi '<?php echo $post->username; ?>'" onclick="return confirm('Reset Sandi <?php echo $post->nama_user; ?> menjadi <?php echo $post->username; ?>?')"><button class="btn btn-success btn-xs"><i class="fa fa-undo"></i> Reset Sandi</button></a>
                                <a href="<?php echo base_url('index.php/uman?admin='); echo $this->safe->convert($post->username,$this->session->userdata("user_name")); ?>" data-toggle="tooltip" title="Jadikan Admin: '<?php echo $post->username; ?>'" onclick="return confirm('Jadikan <?php echo $post->nama_user; ?> sebagai Admin?')"><button class="btn btn-warning btn-xs"><i class="fa fa-user-circle"></i> Jadi Tim Arsip</button></a>
                                <a href="<?php echo base_url('index.php/uman?delete='); echo $this->safe->convert($post->username,$this->session->userdata("user_name")); ?>" data-toggle="tooltip" title="Hapus akun '<?php echo $post->username; ?>'" onclick="return confirm('Hapus akun <?php echo $post->nama_user; ?>?')"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus Akun</button></a>
                            </td>
                        </tr>
                        <?php }}else{echo "<tr><td colspan='8' align='center'> <b><i>*NO USER TO SHOW*</i></b> </td></tr>";}; ?>
                    </tbody>
                </table>
               </div>
			  </div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url('/style/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/datatables/DataTables-1.10.16/js/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/style/datatables/DataTables-1.10.16/js/dataTables.bootstrap.js');?>"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable({
        "language": {
            "url": "<?php echo base_url('/style/datatables/DataTables-1.10.16/js/Indonesian.json');?>"
        }
        });
  } );
</script>
</body>
</html>