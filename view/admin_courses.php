<?php
include_once 'admin_header.php';
?>

<?php
	$data=$srijan->fetch_all_courses();
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
			<p class="bg-dark text-white p-2">List Of Courses</p>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Course ID</th>
						<th scope="col">Name</th>
						<th scope="col">Author</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $key) {
						echo '
							<tr>
								<th scope="row">'.$key["course_id"].'</th>
								<td>'.$key["course_name"].'</td>
								<td>'.$key["course_author"].'</td>
								<td>
									<form action="view/admin_editCourse.php" method="POST" class="d-inline">
										<input type="hidden" value='.$key["course_id"].' name="id">
										<button type="submit" class="btn btn-info mr-3" name="view" value="View">
											<i class="fas fa-pen"></i>
										</button>
									</form>
									<form action="" method="POST" class="d-inline">
										<input type="hidden" value='.$key["course_id"].' name="id">
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
		<a class="btn btn-danger box" href="<?php echo $base_url;?>addCourse">
			<i class="fas fa-plus fa-2x"></i>
		</a>
	</div>

</div>

<?php
	if(isset($_REQUEST['delete'])){
		$data1=$srijan->delete_a_courses($_REQUEST['id']);
		if($data1){
			echo '<meta http-equiv="refresh" content="300" />';
		}else{
			echo "Unable to delete Data";
		}
	}
?>