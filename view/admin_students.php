<?php
	include_once 'admin_header.php';
?>

<?php
	$data=$srijan->fetch_all_students();
?>


<div class="container-fluid mb-5" style="margin-top: 40px;">
	<div class="row">
		<nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
			<?php
			include_once 'admin_sidebar.php';
			?>
		</nav>
		<div class="col-sm-9 mt-5">
			<!-- Table -->
			<p class="bg-dark text-white p-2">List Of Students</p>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Student ID</th>
						<th scope="col">Name</th>
						<th scope="col">E-mail</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $key) {
						echo '
							<tr>
								<th scope="row">'.$key["stu_id"].'</th>
								<td>'.$key["stu_name"].'</td>
								<td>'.$key["stu_email"].'</td>
								<td>
									<form action="editStudentDetail" method="POST" class="d-inline">
										<input type="hidden" value='.$key["stu_id"].' name="id">
										<button type="submit" class="btn btn-info mr-3" name="view" value="View">
											<i class="fas fa-pen"></i>
										</button>
									</form>
									<form action="" method="POST" class="d-inline">
										<input type="hidden" value='.$key["stu_email"].' name="stu_email">
										<button type="submit" class="btn btn-secondary" name="delete" value="Delete">
											<i class="far fa-trash-alt"></i>
										</button>
									</form>
								</td>
							</tr>
						';
					} ?>
					
				</tbody>
			</table>
		</div>
	</div>
	<div>
		<a class="btn btn-danger box" href="<?php echo $base_url;?>addNewStudent">
			<i class="fas fa-plus fa-2x"></i>
		</a>
	</div>

</div>

<?php
	if(isset($_REQUEST['delete'])){
		$data1=$srijan->delete_a_student($_REQUEST['stu_email']);
		if($data1){
			echo '<meta http-equiv="refresh" content="300" />';
		}else{
			echo "Unable to delete Data";
		}
	}
?>