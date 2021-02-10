<?php
include_once 'admin_header.php';
?>

<?php
	if (isset($_REQUEST['lessonSubmitBtn'])) {
		if (($_REQUEST['lesson_name'] == "") && ($_REQUEST['lesson_desc'] == "") && ($_REQUEST['course_id'] == "") && ($_REQUEST['course_name'] == "")){
			$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Please Fill All Fields.....</div>';
		}else{
			$lesson_name = $_REQUEST['lesson_name'];
			$lesson_desc = $_REQUEST['lesson_desc']; 
			$course_id = $_REQUEST['course_id'];
			$course_name = $_REQUEST['course_name'];

			$lesson_link = $_FILES['lesson_link']['name'];
			$lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
			$link_folder = 'assets/videos/uploads/'.$lesson_link;

			move_uploaded_file($lesson_link_temp, $link_folder);

			$data = $srijan->addlesson($lesson_name, $lesson_desc, $course_id, $course_name, $link_folder);
			if($data){
				$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">New Lesson Added Successfully.</div>';
			}else{
				$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Error While Uploading...</div>';
			}
		}
	}
?>

<div class="container-fluid mb-5" style="margin-top: 40px;">
	<div class="row">
		<nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
			<?php
			include_once 'admin_sidebar.php';
			?>
		</nav>
		<div class="col-sm-6 mt-5 mx-3 jumbotron">

			<!-- Main Content -->
			<h3>Add New Lesson</h3>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="course_id">Course ID</label>
					<input type="text" class="form-control" id="course_id" name="course_id" value="<?php if (isset($_SESSION['course_id'])) {echo $_SESSION['course_id'];}?>" readonly>
				</div>
				<div class="form-group">
					<label for="course_name">Course Name</label>
					<input type="text" class="form-control" id="course_name" name="course_name" value="<?php if (isset($_SESSION['course_name'])) {echo $_SESSION['course_name'];}?>" readonly>
				</div> 
				<div class="form-group">
					<label for="lesson_name">Lesson Name</label>
					<input type="text" class="form-control" id="lesson_name" name="lesson_name">
				</div>
				<div class="form-group">
					<label for="lesson_desc">Lesson Description</label>
					<textarea class="form-control" id="lesson_desc" name="lesson_desc" row="2"></textarea>
				</div>
				<div class="form-group">
					<label for="lesson_link">Lesson Video Link</label>
					<input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-danger" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
					<a class="btn btn-secondary" href="<?php echo $base_url;?>lessons">Close</a>
				</div>
				<?php
					if (isset($msg)) {
						echo $msg;
					}
				?>
			</form>

			
		</div>
	</div>
</div>

