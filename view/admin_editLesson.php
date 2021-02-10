<?php
	include_once 'admin_header.php';
	$lesson_id = $_REQUEST['id'];
	$data=$srijan->fetch_lesson_by_id($lesson_id);
?>


<?php
	if (isset($_REQUEST['requpdate'])) {
		if (($_REQUEST['lesson_id'] == "") && ($_REQUEST['lesson_name'] == "") && ($_REQUEST['lesson_desc'] == "") && ($_REQUEST['course_id'] == "") && ($_REQUEST['course_name'] == "")){
			$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Please Fill All Fields</div>';
		}else{
			$cid = $_REQUEST['lesson_id'];
			$course_name = $_REQUEST['course_name'];
			$course_id = $_REQUEST['course_id'];
			$lesson_name = $_REQUEST['lesson_name'];
			$lesson_desc = $_REQUEST['lesson_desc'];

			$lesson_link = $_FILES['lesson_link']['name'];
			$lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
			$link_folder = 'assets/videos/uploads/'.$lesson_link;

			move_uploaded_file($lesson_link_temp, $link_folder);

			$data1 = $srijan->updateLesson($lesson_name, $lesson_desc, $course_id, $course_name, $link_folder, $cid);
			if($data1){
				$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Lesson Updated Successfully.</div>';
			}else{
				$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Error While Updating...</div>';
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
			<h3>Update Lesson Detail</h3>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="course_id">Lesson ID</label>
					<input type="text" class="form-control" id="lesson_id" name="lesson_id" value="<?php if(isset($data['lesson_id'])){ echo $data['lesson_id'];} ?>" readonly>
				</div>
				<div class="form-group">
					<label for="course_id">Course ID</label>
					<input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($data['course_id'])){ echo $data['course_id'];} ?>" readonly>
				</div>
				<div class="form-group">
					<label for="course_name">Course Name</label>
					<input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($data['course_name'])){ echo $data['course_name'];} ?>" readonly>
				</div> 
				<div class="form-group">
					<label for="lesson_name">Lesson Name</label>
					<input type="text" class="form-control" id="lesson_name" name="lesson_name" value="<?php if(isset($data['lesson_name'])){ echo $data['lesson_name'];} ?>">
				</div>
				<div class="form-group">
					<label for="lesson_desc">Lesson Description</label>
					<textarea class="form-control" id="lesson_desc" name="lesson_desc" row="2"><?php if(isset($data['lesson_desc'])){ echo $data['lesson_desc'];} ?></textarea>
				</div>
				<div class="form-group">
					<label for="lesson_link">Lesson Link</label>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="<?php if(isset($data['lesson_link'])){echo $data['lesson_link'];} ?>" allowfullscreen></iframe>
					</div>
					<input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
					<a class="btn btn-secondary" href="<?php echo $base_url;?>">Close</a>
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



