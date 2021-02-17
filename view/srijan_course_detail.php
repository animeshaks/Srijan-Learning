<!-- Banner -->
<div class="container-fluid bg-dark">
	<div class="row">
		<img src="<?php echo $base_url;?>assets/images/courseBanner.jpg" alt="courses" style="height: 500px;width: 100%;object-fit: cover;box-shadow: 10px;padding: 0px;">
	</div>
</div>
<?php
	if (isset($_GET['slug'])) {
		$course_id = $_GET['slug'];
		$_SESSION['course_id'] = $course_id;
		$course_detail = $srijan->fetch_a_course_by_id($course_id);
		$lessons = $srijan->fetch_lessons_by_course_id($course_id);
	}
?>
<!-- Main Content -->
<div class="container mt-5">
	<div class="row">
		<div class="col-md-4">
			<img src="<?php echo $base_url.$course_detail['course_img'];?>" class="card-img-top" alt="" >
		</div>
		<div class="col-md-8">
			<div class="card-body">
				<h5 class="card-title">Course Name : <?php echo $course_detail['course_name'];?></h5>
				<p class="card-text">Desctiption : <?php echo $course_detail['course_desc'];?> </p>
				<p class="card-text">Duration : <?php echo $course_detail['course_duration'];?></p>
				<form action="<?php echo $base_url; ?>checkout" method="post">
					<p class="card-text d-inline">Price : <small><del>&#8377; <?php echo $course_detail['course_original_price'];?></del></small>
						<span class="font-weight-bold">&#8377; <?php echo $course_detail['course_price'];?></span>
					</p>
					<input type="hidden" value="<?php echo $course_detail['course_price']?>" name="course_price">
					<button type="submit" class="btn btn-primary text-white float-right" name="buy">Buy Now</button>
				</form>
			</div>
		</div>
	</div>	
</div>

<div class="container">
	<div class="row">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">Lesson No.</th>
					<th scope="col">Lesson Name</th>
				</tr> 
			</thead>
			<tbody>
				<?php
					if($lessons){
						$num = 0;
						foreach ($lessons as $key) {
							$num++;
							echo '
								<tr>
									<td scope="row">'.$num.'</td>
									<td scope="row">'.$key["lesson_name"].'</td>
								</tr>';
						}	
					}				
				?>
				
			</tbody>
		</table>
	</div>
</div>

