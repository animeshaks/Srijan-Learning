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

	public function addCourse($course_name, $course_desc, $course_author, $course_duration, $course_original_price, $course_price, $img_folder){
		$course_name = mysqli_real_escape_string($this->db,$course_name);
		$course_desc = mysqli_real_escape_string($this->db,$course_desc);
		$course_author = mysqli_real_escape_string($this->db,$course_author);
		$course_duration = mysqli_real_escape_string($this->db,$course_duration);
		$course_original_price = mysqli_real_escape_string($this->db,$course_original_price);
		$course_price = mysqli_real_escape_string($this->db,$course_price);
		$img_folder = mysqli_real_escape_string($this->db,$img_folder);

		$query = mysqli_query($this->db, "INSERT INTO course (course_name,course_desc,course_author,course_img,course_duration,course_price,course_original_price) VALUES ('$course_name','$course_desc','$course_author','$img_folder','$course_duration','$course_price','$course_original_price')") or die(mysqli_error($this->db));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function fetch_all_courses(){
		$query = mysqli_query($this->db,"SELECT * FROM course") or die(mysqli_error($this->db));
		if ($query) {
			while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
				$data[]=$row;
			}
			return $data;
		}
	}

	public function delete_a_courses($id){
		$query = mysqli_query($this->db,"DELETE FROM course WHERE course_id = '$id'") or die(mysqli_error($this->db));
		if($query)
			return true;
		else
			return false;
	}
}
?>