<?php
include_once 'admin_header.php';
?>

<div class="container-fluid mb-5" style="margin-top: 40px;">
	<div class="row">
		<nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
			<?php
			include_once 'admin_sidebar.php';
			?>
		</nav>
		<div class="col-sm-9 mt-5">
			
			<form method="post" action="" class="d-print-none">
				<div class="form-group row">
					<center>
						<table>
							<tr>
								<th><input type="date" class="form-control" id="startdate" name="startdate"></</th>
								<th><span> to </span></th>
								<th><input type="date" class="form-control" id="enddate" name="enddate"></th>
								<th><input type="submit" class="btn btn-secondary" value="Search" name="searchsubmit"></th>
							</tr>
						</table>
					</center>
				</div>
			</form>
			<?php
				if(isset($_REQUEST['searchsubmit'])){
					$startdate = $_REQUEST['startdate'];
					$enddate = $_REQUEST['enddate'];

					$data = $srijan->fetch_sell_report($startdate,$enddate);

					if($data){
						echo '<p class="bg-dark text-white p-2 text-center">Order Details</p>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Order ID</th>
									<th scope="col">Course ID</th>
									<th scope="col">Student Eamil</th>
									<th scope="col">Payment Status</th>
									<th scope="col">Order Date</th>
									<th scope="col">Amount</th>
								</tr>
							</thead>
							<tbody>';

							foreach ($data as $key) {
								echo '<tr>
										<td scope="row">'.$key["order_id"].'</td>
										<td>'.$key["course_id"].'</td>
										<td>'.$key["stu_email"].'</td>
										<td>'.$key["status"].'</td>
										<td>'.$key["order_date"].'</td>
										<td>'.$key["amount"].'</td>
									</tr>';
							}

							echo '<tr class="d-print-none text-center">
									<td colspan="6"><button type="button" class="btn btn-primary" onclick="javascript:window.print();">Print</button></td>
								</tr>
								</tbody>
							</table>';
					}else{
						echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'>No Records Found</div>";
					}
				}
			?>

		</div>
	</div>

</div>
