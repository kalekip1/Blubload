<?php
require_once('classes/Config.class.php');
$conf = new Config;

require_once('connect.php');

if($conf->debugMode){
	error_reporting('E_ALL');
}