<?php
include_once 'student_header.php';
?>

<?php
	$stu_email = $_SESSION['useremail'];
	$data=$srijan->fetch_stu_detail_by_mail($stu_email);
?>

<?php
	if (isset($_REQUEST['reqUpdateStudent'])) {
		if (($_REQUEST['stu_name'] == "") && ($_REQUEST['stu_occ'] == "") && ($_REQUEST['stu_mobile'] == "")){
			$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Please Fill All Fields</div>';
		}else{
			$stu_email = $_SESSION['useremail'];
			$stu_name = $_REQUEST['stu_name'];
			$stu_occ = $_REQUEST['stu_occ'];
			$stu_mobile = $_REQUEST['stu_mobile'];

			$stu_img = $_FILES['stu_img']['name'];
			$stu_img_temp = $_FILES['stu_img']['tmp_name'];
			$img_folder = 'assets/images/uploads/'.$stu_img;

			if(move_uploaded_file($stu_img_temp, $img_folder)){
				$data1 = $srijan->update_student_details_by_student($stu_email, $stu_name,  $stu_mobile, $stu_occ, $img_folder);
				if($data1){
					$data2 = $srijan->update_user_detail_by_student($stu_name, $stu_email);
					if($data2){
						$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Details Updated Successfully.</div>';
					}else{
						$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Error While Updating Detail...</div>';
					}
				}else{
					$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Error While Updating Student...</div>';
				}
			}else{
				$msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Error While Uploading Image...</div>';
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
			<div class="row">
				<div class="col-4">
					<img src="<?php if(isset($data['stu_img'])){echo $data['stu_img'];} ?>" alt="studentimage" class= "img-thumbnail" style="height: 200px;width: 200px;border-radius: 50%;">
				</div>
				<div class="col-8">
					<table class="mt-5">
						<tr>
							<td><h4>Student ID</h4></td>
							<td><h4> : <?php if(isset($data['stu_id'])){ echo $data['stu_id'];} ?></h4></td>
						</tr>
						<tr>
							<td><h4>Email ID</h4></td>
							<td><h4> : <?php if(isset($data['stu_email'])){ echo $data['stu_email'];} ?></h4></td>
						</tr>
					</table>
				</div>
			</div>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="stu_name">Student Name</label>
					<input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php if(isset($data['stu_name'])){ echo $data['stu_name'];} ?>">
				</div> 
				<div class="form-group">
					<label for="stu_occ">Student Occupation</label>
					<textarea class="form-control" id="stu_occ" name="stu_occ" row="2"><?php if(isset($data['stu_occ'])){ echo $data['stu_occ'];} ?></textarea>
				</div>
				<div class="form-group">
					<label for="stu_mobile">Mobile Number</label>
					<input type="text" class="form-control" id="stu_mobile" name="stu_mobile" value="<?php if(isset($data['stu_mobile'])){ echo $data['stu_mobile'];} ?>">
				</div>
				<div class="form-group">
					<label for="stu_img">Student Image</label>
					<input type="file" class="form-control-file" id="stu_img" name="stu_img">
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-danger" id="reqUpdateStudent" name="reqUpdateStudent">Update</button>
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

