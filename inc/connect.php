<?php
try {
	$pdo = new PDO("mysql:host=$conf->dbHost;
						  dbname=$conf->dbName", 
						  $conf->dbUser, 
						  $conf->dbPass);
} catch(PDOException $e){
	die($conf->dbErrorMsg);
}