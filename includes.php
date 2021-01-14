<?php
	header('Access-Control-Allow-Origin: *');
	ob_start("ob_gzhandler");
	error_reporting(2);
	date_default_timezone_set("Asia/Kolkata");
	session_start();

	include_once 'config/dbconfig.php';
	include_once 'config/generalconfig.php';
	include_once 'controller/srijan_controller.php';

	$srijan = new anisrijan($db);

	$userdetails = $srijan->user_info($_SESSION['useremail']);
	$usertype=$userdetails['user_type'];
?>
