<?php
	include_once 'student_header.php';
	$stu_email = $_SESSION['useremail'];
	$data = $srijan->fetch_all_purchased_courses($stu_email);
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
			<h3 class="text-center">All Courses</h3>

			<?php
				if($data){
					foreach ($data as $key) {
			?>
				<div class="bg-light mb-3">
					<h5 class="card-header"><?php echo $key['course_name']; ?></h5>
					<div class="row">
						<div class="col-sm-3">
							<img src="<?php echo $key['course_img']; ?>" class="card-img-top mt-4" alt="pic">
						</div>
						<div class="col-sm-6 mb-3">
							<div class="card-body">
								<p class="card-title"><?php echo $key['course_desc']; ?></p>
								<small class="card-text">Duration : <?php echo $key['course_duration']; ?></small><br>
								<small class="card-text">Instructor : <?php echo $key['course_author']; ?></small><br>
								<p class="card-text d-inline">Price : <small><del>&#8377; <?php echo $key['course_original_price'];?></del></small>
									<span class="font-weight-bold">&#8377; <?php echo $key['course_price'];?></span>
								</p>
								<a href="<?php echo $base_url; ?>watch-course/<?php echo $key['course_id'];?>" class="btn btn-primary mt-5 float-right">Watch Course</a>
							</div>
						</div>
					</div>
				</div>
			<?php
					}
				}
			?>

			
		</div>
	</div>
</div>


