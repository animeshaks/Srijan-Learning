<?php
include_once 'admin_header.php';
?>

<?php
	if (isset($_REQUEST['courseSubmitBtn'])) {
		if (($_REQUEST['course_name'] == "") && ($_REQUEST['course_desc'] == "") && ($_REQUEST['course_author'] == "") && ($_REQUEST['course_duration'] == "") && ($_REQUEST['course_original_price'] == "") && ($_REQUEST['course_price'] == "")){
			$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Please Fill All Fields</div>';
		}else{
			$course_name = $_REQUEST['course_name'];
			$course_desc = $_REQUEST['course_desc'];
			$course_author = $_REQUEST['course_author'];
			$course_duration = $_REQUEST['course_duration'];
			$course_original_price = $_REQUEST['course_original_price'];
			$course_price = $_REQUEST['course_price'];

			$course_image = $_FILES['course_img']['name'];
			$course_image_temp = $_FILES['course_img']['tmp_name'];
			$img_folder = 'assets/images/uploads/'.$course_image;

			move_uploaded_file($course_image_temp, $img_folder);

			$data = $srijan->addCourse($course_name, $course_desc, $course_author, $course_duration, $course_original_price, $course_price, $img_folder);
			if($data){
				$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">New Course Added Successfully.</div>';
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
			<h3>Add New Course</h3>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="course_name">Course Name</label>
					<input type="text" class="form-control" id="course_name" name="course_name">
				</div> 
				<div class="form-group">
					<label for="course_desc">Course Description</label>
					<textarea class="form-control" id="course_desc" name="course_desc" row="2"></textarea>
				</div>
				<div class="form-group">
					<label for="course_author">Course Author</label>
					<input type="text" class="form-control" id="course_author" name="course_author">
				</div>
				<div class="form-group">
					<label for="course_duration">Course Duration</label>
					<input type="text" class="form-control" id="course_duration" name="course_duration">
				</div>
				<div class="form-group">
					<label for="course_original_price">Course Original Price</label>
					<input type="text" class="form-control" id="course_original_price" name="course_original_price">
				</div>
				<div class="form-group">
					<label for="course_price">Course Selling Price</label>
					<input type="text" class="form-control" id="course_price" name="course_price">
				</div>
				<div class="form-group">
					<label for="course_img">Course Image</label>
					<input type="file" class="form-control-file" id="course_img" name="course_img">
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
					<a class="btn btn-secondary" href="<?php echo $base_url;?>courses">Close</a>
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

