<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Upload Image</title>
	</head>
	<body>
		<form action="<?php echo base_url('Upload/upload_file'); ?>" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Image</td>
					<td>:</td>
					<td><input type="file" name="picture"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Upload image..."></td>
				</tr>
			</table>
		</form>
	</body>
</html>