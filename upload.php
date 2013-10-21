<?php
include('inc/init.php');

if(isset($_POST['submit']) && $_FILES['imgfile']['size'] > 0){
	$filename = $_FILES['imgfile']['name'];
	$tempname = $_FILES['imgfile']['tmp_name']; //Name of the temporary stored file name
	$filesize = $_FILES['imgfile']['size'];
	$filetype = $_FILES['imgfile']['type'];
	
	$fp = fopen($tempname, 'r'); // open a file handle of the temporary file
	$imgContent = fread($fp, filesize($tempname)); // read the temp file
	fclose($fp); // close the file handle
	
	$query = "INSERT INTO `{$conf->dbTPrefix}images`
			  VALUES ('', 
					  :filename, 
					  :filetype,
					  :filesize,
					  :imgContent
			  )
	";
	
	$query = $pdo->prepare($query);
	$query->bindValue(':filename', $filename);
	$query->bindValue(':filetype', $filetype);
	$query->bindValue(':filesize', $filesize);
	$query->bindValue(':imgContent', $imgContent);
	$query->execute();
	
	header('Location: view-image.php?id='.$pdo->lastInsertId());
	die();
} else {
	header('Location: index.php?noImageSelected');
	die();
}

