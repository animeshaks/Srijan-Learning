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

	public function check_email_registered($stuemail){
		$stuemail = mysqli_real_escape_string($this->db,$stuemail);
		$query = mysqli_query($this->db, "SELECT stu_email FROM student WHERE stu_email = '$stuemail'") or die(mysqli_error($this->db));
		$row = $query->num_rows;
		return $row;
	}

}
?>