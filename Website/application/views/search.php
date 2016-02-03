<form action="<?php echo base_url('Upload/upload_file'); ?>" method="post" enctype="multipart/form-data" class="Ticket">
	<table class="Table">
		<tr>
			<td width="20%">Image (jpeg format)</td>
			<td width="25%"><input type="file" name="picture" required></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td align="right"><input type="submit" value="Upload image..."></td>
		</tr>
	</table>
</form>
