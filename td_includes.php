<?php
	header('Access-Control-Allow-Origin: *');
	ob_start("ob_gzhandler");
	error_reporting(2);
	date_default_timezone_set("Asia/Kolkata");

	include_once 'config/dbconfig.php';
	include_once 'config/generalconfig.php';
	include_once 'controller/srijan_controller.php';

	$srijan = new anisrijan($db);
?>
