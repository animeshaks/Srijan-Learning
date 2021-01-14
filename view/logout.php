<?php
	include_once 'includes.php';
	session_destroy();
	header('location: '.$base_url);
?>