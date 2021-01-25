<?php
	include_once 'admin_header.php';
?>


<!-- Side Bar -->
<div class="container-fluid mb-5" style="margin-top: 40px;">
	<div class="row">
		<nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
			<?php
				include_once 'admin_sidebar.php';
			?>
		</nav>
		<div class="col-sm-9 mt-5">
			<div class="row mx-5 text-center">
				<div class="col-sm-4 mt-5">
					<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
						<div class="card-header">Courses</div>
						<div class="card-body">
							<h4 class="card-title">
								5
							</h4>
							<a class="btn text-white" href="#">View</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4 mt-5">
					<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
						<div class="card-header">Students</div>
						<div class="card-body">
							<h4 class="card-title">
								25
							</h4>
							<a class="btn text-white" href="#">View</a>
						</div>
					</div>
				</div>
				<div class="col-sm-4 mt-5">
					<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
						<div class="card-header">Sold Courses</div>
						<div class="card-body">
							<h4 class="card-title">
								5
							</h4>
							<a class="btn text-white" href="#">View</a>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Table -->
			<div class="mx-5 mt-5 text-center">
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
						<tr>
							<th scope="row">22</th>
							<td>100</td>
							<td>ani@gmail.com</td>
							<td>20/20/2020</td>
							<td>200</td>
							<td>
								<button type="submit" class="btn btn-secondary" name="delete" value="Delete">
									<i class="far fa-trash-alt"></i>
								</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>