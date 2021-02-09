<?php
	include_once 'admin_header.php';
	$course_id = $_REQUEST['id'];
	$data=$srijan->fetch_a_student_by_id($course_id);
?>


<?php
	if (isset($_REQUEST['reqUpdate'])) {
		if (($_REQUEST['stu_id'] == "") && ($_REQUEST['stu_name'] == "") && ($_REQUEST['stu_email'] == "") && ($_REQUEST['stu_pass'] == "") && ($_REQUEST['stu_cpass'] == "") && ($_REQUEST['stu_occ'] == "")){
			$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Please Fill All Fields</div>';
		}else{
			$sid = $_REQUEST['stu_id'];
			$stu_name = $_REQUEST['stu_name'];
			$stu_email = $_REQUEST['stu_email'];
			$stu_pass = md5($_REQUEST['stu_pass']);
			$stu_cpass = md5($_REQUEST['stu_cpass']);
			$stu_occ = $_REQUEST['stu_occ'];

			if($stu_pass == $stu_cpass){
				$data = $srijan->update_student_detail_by_admin($sid, $stu_name, $stu_email, $stu_pass, $stu_occ);
				if($data){
					$data1 = $srijan->update_user_detail_by_admin($stu_name, $stu_email, $pass);
					if($data1){
						$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student Details Updated Successfully.</div>';
					}else{
						$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Error While Updating Student Detail...</div>';
					}
				}else{
					$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Error While Updating Student...</div>';
				}
			}else{
				$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Password not matched !!!!</div>';
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
			<br>
			<!-- Main Content -->
			<h3 class="text-center">Update Student Details</h3>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="stu_id">Student ID</label>
					<input type="text" class="form-control" id="stu_id" name="stu_id" value="<?php if(isset($data['stu_id'])){ echo $data['stu_id'];} ?>" readonly>
				</div>
				<div class="form-group">
					<label for="stu_name">Name</label>
					<input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php if(isset($data['stu_name'])){ echo $data['stu_name'];} ?>">
				</div> 
				<div class="form-group">
					<label for="stu_email">Email</label>
					<input type="text" class="form-control" id="stu_email" name="stu_email" value="<?php if(isset($data['stu_email'])){ echo $data['stu_email'];} ?>" readonly>
				</div>
				<div class="form-group">
					<label for="stu_pass">Password <small style="color: #ff0000;">**Must be changed, otherwise not be recoverd</small></label>
					<input type="password" class="form-control" id="stu_pass" name="stu_pass" value="<?php if(isset($data['stu_pass'])){ echo $data['stu_pass'];} ?>">
				</div>
				<div class="form-group">
					<label for="stu_cpass">Confirm Password</label>
					<input type="password" class="form-control" id="stu_cpass" name="stu_cpass" value="<?php if(isset($data['stu_pass'])){ echo $data['stu_pass'];} ?>">
				</div>
				<div class="form-group">
					<label for="stu_occ">Occupation</label>
					<input type="text" class="form-control" id="stu_occ" name="stu_occ" value="<?php if(isset($data['stu_occ'])){ echo $data['stu_occ'];} ?>">
				</div>
				<div class="text-center">
					<br>
					<button type="submit" class="btn btn-danger" id="reqUpdate" name="reqUpdate">Update</button>
					<a class="btn btn-secondary" href="<?php echo $base_url;?>students">Close</a>
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



