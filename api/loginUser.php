<?php 
	include_once '../includes.php';

	if(!isset($_SESSION)){
		session_start();
	}

	//Admin Login Vrification
	if(!isset($_SESSION['is_admin_login']) && $_POST['action'] == "chk_admin_login"){
		if(isset($_POST['adminLogEmail']) && isset($_POST['adminLogPass'])){
			$adminLogEmail = $_POST['adminLogEmail'];
			$adminLogPass = md5($_POST['adminLogPass']);

			$data = $srijan->chkUserLogin($adminLogEmail, $adminLogPass);
			if($data === 1){
				$_SESSION['is_admin_login'] = true;
				$_SESSION['useremail'] = $adminLogEmail;
				echo json_encode($data);
			}else if($data === 0){
				echo json_encode($data);
			}
		}
	}

	//Student Login Vrification
	if(!isset($_SESSION['is_login'])){
		if(isset($_POST['checkLogemail']) && isset($_POST['stuLogEmail']) && isset($_POST['stuLogPass'])){
			$stuLogEmail = $_POST['stuLogEmail'];
			$stuLogPass = $_POST['stuLogPass'];

			$pass = md5($stuLogPass);
			$data = $srijan->chkUserLogin($stuLogEmail, $pass);
			if($data === 1){
				$_SESSION['is_login'] = true;
				$_SESSION['useremail'] = $stuLogEmail;
				echo json_encode($data);
			}else if($data === 0){
				echo json_encode($data);
			}
		}
	}
	

?>