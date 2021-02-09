<?php
	include_once 'admin_header.php';
	$admin_email = $_SESSION['useremail'];
?>


<?php
	if (isset($_REQUEST['reqUpdatePass'])) {
		if (($_REQUEST['pass'] == "") && ($_REQUEST['cpass'] == "")){
			$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Please Fill All Fields</div>';
		}else{
			$pass = md5($_REQUEST['pass']);
			$cpass = md5($_REQUEST['cpass']);

			if($pass == $cpass){
				$data = $srijan->changeAdminPassword($admin_email, $pass);
				if($data){
					$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Password Changed Successfully.</div>';
				}else{
					$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Error While Changing Password.....</div>';
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
			<h3 class="text-center">Change Password</h3>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="user_email">Email ID</label>
					<input type="text" class="form-control" id="user_email" name="user_email" value="<?php echo $admin_email; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="pass">Password</label>
					<input type="password" class="form-control" id="pass" name="pass">
				</div>
				<div class="form-group">
					<label for="cpass">Confirm Password</label>
					<input type="password" class="form-control" id="cpass" name="cpass">
				</div>
				<div class="text-center">
					<br>
					<button type="submit" class="btn btn-danger" id="reqUpdate" name="reqUpdatePass">Update</button>
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



