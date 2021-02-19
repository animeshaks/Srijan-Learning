<?php
	include_once 'admin_header.php';
	$course_num = $srijan->fetch_number_of_course();
	$student_num = $srijan->fetch_number_of_student();
	$ordered_course_num = $srijan->fetch_number_of_ordered_course();

	$course_order = $srijan->fetch_all_course_order();
?>


<!-- Side Bar -->
<div class="container-fluid mb-5" style="margin-top: 40px;">
	<div class="row">
		<nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
			<?php
				include_once 'admin_sidebar.php';
			?>
		</nav>
		<div class="col-sm-9 my-4">
			<div class="row mx-5 text-center">
				<div class="col-sm-4 mt-5">
					<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
						<div class="card-header">Courses</div>
						<div class="card-body">
							<h4 class="card-title">
								<?php echo $course_num; ?>
							</h4>
							<a class="btn text-white" href="<?php echo $base_url;?>courses">View</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4 mt-5">
					<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
						<div class="card-header">Students</div>
						<div class="card-body">
							<h4 class="card-title">
								<?php echo $student_num; ?>
							</h4>
							<a class="btn text-white" href="<?php echo $base_url;?>students">View</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4 mt-5">
					<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
						<div class="card-header">Sold Courses</div>
						<div class="card-body">
							<h4 class="card-title">
								<?php echo $ordered_course_num; ?>
							</h4>
							<a class="btn text-white" href="<?php echo $base_url;?>sell-report">View</a>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Table -->
			<div class="mx-5 my-5 text-center">
				<p class="bg-dark text-white p-2">Course Ordered</p>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Order ID</th>
							<th scope="col">Course ID</th>
							<th scope="col">Student E-mail</th>
							<th scope="col">Order Date</th>
							<th scope="col">Amount</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>

						

						<?php
							foreach ($course_order as $key) {
								echo '<tr>
										<td scope="row">'.$key["order_id"].'</td>
										<td>'.$key["course_id"].'</td>
										<td>'.$key["stu_email"].'</td>
										<td>'.$key["order_date"].'</td>
										<td>'.$key["amount"].'</td>
										<td><form action="" method="POST" class="d-inline">
											<input type="hidden" value='.$key["co_id"].' name="id">
											<button type="submit" class="btn btn-secondary" name="delete" value="Delete">
												<i class="far fa-trash-alt"></i>
											</button>
										</form></td>
									</tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php
	if(isset($_REQUEST['delete'])){
		$data1=$srijan->delete_a_course_order($_REQUEST['id']);
		if($data1){
			echo '<meta http-equiv="refresh" content="300" />';
		}else{
			echo "Unable to delete Data";
		}
	}
?>