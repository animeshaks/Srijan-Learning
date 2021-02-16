<?php
include_once 'student_header.php';
?>

<?php

	if (isset($_REQUEST['reqAddFeedback'])) {
		if (($_REQUEST['f_content'] == "")){
			$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Please Fill All Fields</div>';
		}else{
			$f_content = $_REQUEST['f_content'];
			$stu_email = $_SESSION['useremail'];

			$data = $srijan->add_student_feedback($stu_email, $f_content);
			if($data){
				$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Feedback Added Successfully.</div>';
			}else{
				$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Error While Adding Feedback...</div>';
			}		
		}
	}
?>

<div class="container-fluid mb-5" style="margin-top: 40px;">
	<div class="row">
		<nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
			<?php
			include_once 'student_sidebar.php';
			?>
		</nav>
		<div class="col-sm-6 mt-5 mx-3 jumbotron">
			<br>
			<!-- Main Content -->
			<h3 class="text-center">Write Feedback</h3>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<textarea class="form-control" id="f_content" name="f_content" rows="4" placeholder="Write Feedback Here......."></textarea>
				</div>
				<div class="text-center">
					<br>
					<button type="submit" class="btn btn-danger" id="reqAddFeedback" name="reqAddFeedback">Save</button>
					<a class="btn btn-secondary" href="<?php echo $base_url;?>student-profile">Close</a>
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


