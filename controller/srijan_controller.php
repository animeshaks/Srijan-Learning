<?php
class anisrijan{
	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function addStudent($stuname, $stuemail, $pass){
		$stuname = mysqli_real_escape_string($this->db,$stuname);
		$stuemail = mysqli_real_escape_string($this->db,$stuemail);
		$pass = mysqli_real_escape_string($this->db,$pass);

		$query = mysqli_query($this->db, "INSERT INTO student (stu_name,stu_email,stu_pass) VALUES ('$stuname','$stuemail','$pass')") or die(mysqli_error($this->db));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function addUser($username, $useremail, $pass){
		$username = mysqli_real_escape_string($this->db,$username);
		$useremail = mysqli_real_escape_string($this->db,$useremail);
		$pass = mysqli_real_escape_string($this->db,$pass);
		$user_type = "student";

		$query = mysqli_query($this->db, "INSERT INTO user (user_name,user_email,user_pass,user_type) VALUES ('$username','$useremail','$pass','$user_type')") or die(mysqli_error($this->db));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function check_email_registered($stuemail){
		$stuemail = mysqli_real_escape_string($this->db,$stuemail);
		$query = mysqli_query($this->db, "SELECT stu_email FROM student WHERE stu_email = '$stuemail'") or die(mysqli_error($this->db));
		$row = $query->num_rows;
		return $row;
	}

	public function chkUserLogin($email, $pass){
		$email = mysqli_real_escape_string($this->db,$email);
		$pass = mysqli_real_escape_string($this->db,$pass);
		$query = mysqli_query($this->db, "SELECT user_email, user_pass FROM user WHERE user_email = '$email' AND user_pass = '$pass'") or die(mysqli_error($this->db));
		$row = $query->num_rows;
		return $row;
	}

	public function user_info($email)
	{
		$query = mysqli_query($this->db,"SELECT user_name, user_type FROM user WHERE user_email='$email'") or die(mysqli_error($this->db));
		if ($query) {
			$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
			return $row;
		}else{
			return false;
		}
	}
}
?>