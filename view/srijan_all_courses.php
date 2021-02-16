<!-- Start Course Page Banner -->
<div class="container-fluid bg-dark">
	<div class="row">
		<img src="<?php echo $base_url;?>assets/images/courseBanner.jpg" alt="courses" style="height: 500px;width: 100%;object-fit: cover;box-shadow: 10px;padding: 0px;">
	</div>
</div>
<!-- End Course Page Banner -->

<!-- Start All Course Section -->
<div class="container mt-5">
	<h1 class="text-center">All Courses</h1>
	<?php
		$courses = $srijan->fetch_all_courses();
	?>
	<div class="row">
		<?php
			foreach ($courses as $data) {	
		?>
		<div class="card-deck mt-4 col-md-4 col-sm-6 col-12">
				<a href="#" class="btn" style="text-align: left;padding: 0px;margin: 0px;">
					<div class="card">
						<img src="<?php echo $data['course_img'];?>" height="250px" class="card-img-top" alt="Guitar" />
						<div class="card-body">
							<h5><?php echo $data['course_name'];?></h5>
							<p><?php echo $data['course_desc'];?></p>
						</div>
						<div class="card-footer">
							<p class="card-text d-inline">
								Price : <small><del>&#8377 <?php echo $data['course_original_price'];?></del></small> <span class="font-weight-bolder">&#8377 <?php echo $data['course_price'];?></span>
							</p>
							<a class="btn btn-primary text-white font-weight-bolder float-right" href="<?php echo $base_url;?>course-details/<?php echo $data['course_id'];?>">Enroll</a>
						</div>
					</div>
				</a>
			</div>
		<?php
			}
		?>
	</div>
</div>
<!-- End All Course Section -->

<!-- Contact Us -->

<?php
	include_once('view/srijan_contact_form.php')
?>