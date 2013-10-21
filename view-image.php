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

//echo $name;

//die();

//$queryResult = $query->fetch(PDO::FETCH_ASSOC);

//list($name, $type, $size, $content) = $queryResult;

//echo $queryResult[3];

//foreach($queryResult as $item){
//	echo $item.'<br /><br />';
//}

//header('Content-length: '.$size);
header('Content-type: '.$type);
echo $image;

/*
? >
<html>
	<head>
		<title><?php echo $name; ?></title>
	</head>
	<body>
		<?php
		header('Content-type: '.$type);
		echo $image;
		?>
	</body>
</html>*/