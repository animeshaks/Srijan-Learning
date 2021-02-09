<?php
	include_once 'admin_header.php';
	$course_id = $_REQUEST['id'];
	$data=$srijan->fetch_a_course_by_id($course_id);
?>


<?php
	if (isset($_REQUEST['requpdate'])) {
		if (($_REQUEST['course_name'] == "") && ($_REQUEST['course_desc'] == "") && ($_REQUEST['course_author'] == "") && ($_REQUEST['course_duration'] == "") && ($_REQUEST['course_original_price'] == "") && ($_REQUEST['course_price'] == "")){
			$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Please Fill All Fields</div>';
		}else{
			$cid = $_REQUEST['course_id'];
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

			$data1 = $srijan->updateCourse($cid,$course_name, $course_desc, $course_author, $course_duration, $course_original_price, $course_price, $img_folder);
			if($data1){
				$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Updated Successfully.</div>';
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
			<h3>Update Course Detail</h3>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="course_id">Course ID</label>
					<input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($data['course_id'])){ echo $data['course_id'];} ?>" readonly>
				</div>
				<div class="form-group">
					<label for="course_name">Course Name</label>
					<input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($data['course_name'])){ echo $data['course_name'];} ?>">
				</div> 
				<div class="form-group">
					<label for="course_desc">Course Description</label>
					<textarea class="form-control" id="course_desc" name="course_desc" row="2"><?php if(isset($data['course_desc'])){ echo $data['course_desc'];} ?></textarea>
				</div>
				<div class="form-group">
					<label for="course_author">Course Author</label>
					<input type="text" class="form-control" id="course_author" name="course_author" value="<?php if(isset($data['course_author'])){ echo $data['course_author'];} ?>">
				</div>
				<div class="form-group">
					<label for="course_duration">Course Duration</label>
					<input type="text" class="form-control" id="course_duration" name="course_duration" value="<?php if(isset($data['course_duration'])){ echo $data['course_duration'];} ?>">
				</div>
				<div class="form-group">
					<label for="course_original_price">Course Original Price</label>
					<input type="text" class="form-control" id="course_original_price" name="course_original_price" value="<?php if(isset($data['course_original_price'])){ echo $data['course_original_price'];} ?>">
				</div>
				<div class="form-group">
					<label for="course_price">Course Selling Price</label>
					<input type="text" class="form-control" id="course_price" name="course_price" value="<?php if(isset($data['course_price'])){ echo $data['course_price'];} ?>">
				</div>
				<div class="form-group">
					<label for="course_img">Course Image</label>
					<img src="<?php if(isset($data['course_img'])){echo $data['course_img'];} ?>" class="img-thumbnail">
					<input type="file" class="form-control-file" id="course_img" name="course_img">
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
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



