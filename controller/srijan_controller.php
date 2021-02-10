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

	public function fetch_a_course_by_id($id){
		$query = mysqli_query($this->db,"SELECT * FROM course WHERE course_id='$id'") or die(mysqli_error($this->db));
		if ($query) {
			$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
			return $row;
		}
	}

	public function updateCourse($cid,$course_name, $course_desc, $course_author, $course_duration, $course_original_price, $course_price, $img_folder){
		$course_name = mysqli_real_escape_string($this->db,$course_name);
		$course_desc = mysqli_real_escape_string($this->db,$course_desc);
		$course_author = mysqli_real_escape_string($this->db,$course_author);
		$course_duration = mysqli_real_escape_string($this->db,$course_duration);
		$course_original_price = mysqli_real_escape_string($this->db,$course_original_price);
		$course_price = mysqli_real_escape_string($this->db,$course_price);
		$img_folder = mysqli_real_escape_string($this->db,$img_folder);

		$query = mysqli_query($this->db, "UPDATE course SET course_name = '$course_name', course_desc = '$course_desc' , course_author = '$course_author' , course_img = '$img_folder', course_duration = '$course_duration', course_price = '$course_price' , course_original_price = '$course_original_price' WHERE course_id = '$cid'") or die(mysqli_error($this->db));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function delete_a_course($id){
		$query = mysqli_query($this->db,"DELETE FROM course WHERE course_id = '$id'") or die(mysqli_error($this->db));
		if($query)
			return true;
		else
			return false;
	}

	public function fetch_all_students(){
		$query = mysqli_query($this->db,"SELECT * FROM student") or die(mysqli_error($this->db));
		if ($query) {
			while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
				$data[]=$row;
			}
			return $data;
		}
	}

	public function delete_a_student($stu_email){
		$query1 = mysqli_query($this->db,"DELETE FROM student WHERE stu_email = '$stu_email'") or die(mysqli_error($this->db));
		$query2 = mysqli_query($this->db,"DELETE FROM user WHERE user_email = '$stu_email'") or die(mysqli_error($this->db));
		if($query1 && $query2)
			return true;
		else
			return false;
	}

	public function addStudentByAdmin($stuname, $stuemail, $pass, $stu_occ){
		$stuname = mysqli_real_escape_string($this->db,$stuname);
		$stuemail = mysqli_real_escape_string($this->db,$stuemail);
		$pass = mysqli_real_escape_string($this->db,$pass);
		$stu_occ = mysqli_real_escape_string($this->db,$stu_occ);

		$query = mysqli_query($this->db, "INSERT INTO student (stu_name,stu_email,stu_pass,stu_occ) VALUES ('$stuname','$stuemail','$pass','$stu_occ')") or die(mysqli_error($this->db));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function fetch_a_student_by_id($id){
		$query = mysqli_query($this->db,"SELECT * FROM student WHERE stu_id='$id'") or die(mysqli_error($this->db));
		if ($query) {
			$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
			return $row;
		}
	}

	public function update_student_detail_by_admin($sid, $stu_name, $stu_email, $stu_pass, $stu_occ){
		$stu_name = mysqli_real_escape_string($this->db,$stu_name);
		$stu_email = mysqli_real_escape_string($this->db,$stu_email);
		$stu_pass = mysqli_real_escape_string($this->db,$stu_pass);
		$stu_occ = mysqli_real_escape_string($this->db,$stu_occ);

		$query = mysqli_query($this->db, "UPDATE student SET stu_name = '$stu_name', stu_pass = '$stu_pass', stu_occ = '$stu_occ' WHERE stu_id = '$sid'") or die(mysqli_error($this->db));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function update_user_detail_by_admin($stu_name, $stu_email, $stu_pass){
		$username = mysqli_real_escape_string($this->db,$stu_name);
		$useremail = mysqli_real_escape_string($this->db,$stu_email);
		$pass = mysqli_real_escape_string($this->db,$stu_pass);

		$query = mysqli_query($this->db, "UPDATE user SET user_name = '$username',user_pass = '$pass' WHERE user_email = '$useremail'") or die(mysqli_error($this->db));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function changeAdminPassword($admin_email, $pass){
		$useremail = mysqli_real_escape_string($this->db,$admin_email);
		$pass = mysqli_real_escape_string($this->db,$pass);
		$query = mysqli_query($this->db, "UPDATE user SET user_pass = '$pass' WHERE user_email = '$useremail'") or die(mysqli_error($this->db));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function fetch_all_course_id(){
		$query = mysqli_query($this->db,"SELECT course_id FROM course") or die(mysqli_error($this->db));
		if ($query) {
			while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
				$data[]=$row;
			}
			return $data;
		}
	}

	public function fetch_course_by_id($id){
		$query = mysqli_query($this->db,"SELECT * FROM course WHERE course_id='$id'") or die(mysqli_error($this->db));
		if ($query) {
			$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
			return $data;
		}
	}

	public function addlesson($lesson_name, $lesson_desc, $course_id, $course_name, $lesson_link){
		$lesson_name = mysqli_real_escape_string($this->db,$lesson_name);
		$lesson_desc = mysqli_real_escape_string($this->db,$lesson_desc);
		$course_id = mysqli_real_escape_string($this->db,$course_id);
		$course_name = mysqli_real_escape_string($this->db,$course_name);
		$lesson_link = mysqli_real_escape_string($this->db,$lesson_link);

		$query = mysqli_query($this->db, "INSERT INTO lesson (lesson_name,lesson_desc,lesson_link,course_id,course_name) VALUES ('$lesson_name','$lesson_desc','$lesson_link','$course_id','$course_name')") or die(mysqli_error($this->db));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function fetch_lessons_by_course_id($id){
		$query = mysqli_query($this->db,"SELECT * FROM lesson WHERE course_id='$id'") or die(mysqli_error($this->db));
		if ($query) {
			while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
				$data[]=$row;
			}
			return $data;
		}
	}

	public function delete_a_lesson($id){
		$query = mysqli_query($this->db,"DELETE FROM lesson WHERE lesson_id = '$id'") or die(mysqli_error($this->db));
		if($query)
			return true;
		else
			return false;
	}

	public function fetch_lesson_by_id($id){
		$query = mysqli_query($this->db,"SELECT * FROM lesson WHERE lesson_id='$id'") or die(mysqli_error($this->db));
		if ($query) {
			$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
			return $data;
		}
	}

	public function updateLesson($lesson_name, $lesson_desc, $course_id, $course_name, $link_folder, $cid){
		$course_name = mysqli_real_escape_string($this->db,$course_name);
		$lesson_name = mysqli_real_escape_string($this->db,$lesson_name);
		$lesson_desc = mysqli_real_escape_string($this->db,$lesson_desc);
		$course_id = mysqli_real_escape_string($this->db,$course_id);
		$link_folder = mysqli_real_escape_string($this->db,$link_folder);

		$query = mysqli_query($this->db, "UPDATE lesson SET lesson_name = '$lesson_name', lesson_desc = '$lesson_desc' , course_name = '$course_name' , course_id = '$course_id', lesson_link = '$link_folder' WHERE lesson_id = '$cid'") or die(mysqli_error($this->db));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}
}
?>