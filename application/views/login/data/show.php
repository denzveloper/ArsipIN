<?php 
echo $this->safe->convert($this->input->get("usr", TRUE),$this->session->userdata('namaus'))."\n";
echo $this->input->get("dat", TRUE);
if($doc != FALSE){foreach($doc as $fill){ ?>
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