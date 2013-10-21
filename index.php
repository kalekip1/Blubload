<?php
require_once('inc/init.php');

?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Blubload</title>
	</head>
	<body>
		<?php
		if(isset($_GET['noImageSelected'])){
			echo '<h3>Uh Oh!</h3>You haven\'t selected any image.';
		}
		?>
		<form method="POST" action="upload.php" enctype="multipart/form-data">
			<h1>Blubload your image</h1>
			<input type="file" name="imgfile" value="Select image" />
			<input type="submit" name="submit" value="Upload" />
		</form>
	</body>
</html>