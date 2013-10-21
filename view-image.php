<?php
include('inc/init.php');

if(!isset($_GET['id'])){
	//User is not supposed to be here, redirect.
	header('Location: index.php');
	die();
}

//Get the file from database
$query = "SELECT * 
		  FROM {$conf->dbTPrefix}images 
		  WHERE id = :id
";
$query = $pdo->prepare($query);
$query->bindValue(':id', $_GET['id']);
$query->execute();

$query->bindColumn(2, $name);
$query->bindColumn(3, $type);
$query->bindColumn(4, $size);
$query->bindColumn(5, $image, PDO::PARAM_LOB);

$query->fetch(PDO::FETCH_BOUND);

header('Content-type: '.$type);
echo $image;