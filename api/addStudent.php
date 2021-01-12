<?php
	include_once '../td_includes.php';

	//Checking Email Already Registered
	if(isset($_POST['checkemail']) && isset($_POST['stuemail'])) {
		$stuemail = $_POST['stuemail'];
		$data = $srijan->check_email_registered($stuemail);
		echo json_encode($data);
	}

	//Insert Student
	if(isset($_POST['stusignup']) && isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stupass']) && isset($_POST['confirmstupass'])) {

		$stuname = $_POST['stuname'];
		$stuemail = $_POST['stuemail'];
		$stupass = $_POST['stupass'];
		$confirmstupass = $_POST['confirmstupass'];

		if($stupass == $confirmstupass){
			$pass = md5($stupass);
			$data = $srijan->addStudent($stuname, $stuemail, $pass);
			if($data){
				echo json_encode("Ok");
			}else{
				echo json_encode("Failed");
			}
			
		}else{
			echo json_encode("Password and confirm not equal");
		}
	}
?>