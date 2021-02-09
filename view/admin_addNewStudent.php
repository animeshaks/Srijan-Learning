<?php
include_once 'admin_header.php';
?>

<?php
	if (isset($_REQUEST['newStuSubmitBtn'])) {
		if (($_REQUEST['stu_name'] == "") && ($_REQUEST['stu_email'] == "") && ($_REQUEST['stu_pass'] == "") && ($_REQUEST['stu_cpass'] == "") && ($_REQUEST['stu_occ'] == "")){
			$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Please Fill All Fields</div>';
		}else{
			$stu_name = $_REQUEST['stu_name'];
			$stu_email = $_REQUEST['stu_email'];
			$stu_pass = $_REQUEST['stu_pass'];
			$stu_cpass = $_REQUEST['stu_cpass'];
			$stu_occ = $_REQUEST['stu_occ'];

			if($stu_pass==$stu_cpass){
				$pass = md5($stu_pass);
				$data = $srijan->addStudentByAdmin($stu_name, $stu_email, $pass, $stu_occ);
				if($data){
					$data1 = $srijan->addUser($stu_name, $stu_email, $pass);
					if($data1){
						$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">New Student Added Successfully.</div>';
					}else{
						$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Error While Adding User...</div>';
					}
				}else{
					$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Error While Adding Student...</div>';
				}
			}else{
				$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Password not matched !</div>';
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
			<h3 class="text-center">Add New Student</h3>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="stu_name">Name</label>
					<input type="text" class="form-control" id="stu_name" name="stu_name">
				</div> 
				<div class="form-group">
					<label for="stu_email">Email</label>
					<input type="text" class="form-control" id="stu_email" name="stu_email">
				</div>
				<div class="form-group">
					<label for="stu_pass">Password</label>
					<input type="password" class="form-control" id="stu_pass" name="stu_pass">
				</div>
				<div class="form-group">
					<label for="stu_cpass">Confirm Password</label>
					<input type="password" class="form-control" id="stu_cpass" name="stu_cpass">
				</div>
				<div class="form-group">
					<label for="stu_occ">Occupation</label>
					<input type="text" class="form-control" id="stu_occ" name="stu_occ">
				</div>
				<div class="text-center">
					<br>
					<button type="submit" class="btn btn-danger" id="newStuSubmitBtn" name="newStuSubmitBtn">Submit</button>
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

