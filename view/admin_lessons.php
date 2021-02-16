<?php
include_once 'admin_header.php';
?>

<?php
	if(isset($_REQUEST['checkid'])){
		$data=$srijan->fetch_all_course_id();

		foreach ($data as $key){
			if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $key['course_id']){
				$result = $srijan->fetch_course_by_id($_REQUEST['checkid']);
				if($result['course_id'] == $_REQUEST['checkid']){
					$_SESSION['course_id'] = $result['course_id'];
					$_SESSION['course_name'] = $result['course_name'];
				}
			}
		}
	}

	// $sql = "SELECT course_id FROM course";
	// $result = $conn->query($sql);
	// while ($row = $result->fetch_assoc()) {
	// 	if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id']){
	// 		$sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}";
	// 		$result = $conn->query($sql);
	// 		$row = $result->fetch_assoc()
	// 		if($row['course_id'] == $_REQUEST['checkid']){
	// 			$_SESSION['course_id'] = $row['course_id'];
	// 			$_SESSION['course_name'] = $row['course_name'];
	// 		}
	// 	}
	// }

?>


<div class="container-fluid mb-5" style="margin-top: 40px;">
	<div class="row">
		<nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
			<?php
			include_once 'admin_sidebar.php';
			?>
		</nav>
		<div class="col-sm-9 mt-5 mx-3">
			<form action="" method="POST" class="form-inline d-print-none">
				<div class="form-group mr-3">
					<table>
						<tr>
							<td style="padding: 10px;"><label for="checkid">Enter Course ID : </label></td>
							<td style="padding: 10px;"><input type="text" class="form-control ml-3" name="checkid"></td>
							<td style="padding: 10px;"><button type="submit" class="btn btn-danger">Search</button></td>
						</tr>
					</table>
				</div>
			</form>

			<?php
				$data1=$srijan->fetch_lessons_by_course_id($_REQUEST['checkid']);
				if(isset($result['course_id'])) {
			?>

			<p class="bg-dark text-white p-2">
				Course ID : <?php if (isset($result['course_id'])) {echo $result['course_id'];} ?>
				| Course Name : <?php if (isset($result['course_name'])) {echo $result['course_name'];} ?>	
			</p>

			<table class="table">
				<thead>
					<tr>
						<th scope="col">Lesson ID</th>
						<th scope="col">Lesson Name</th>
						<th scope="col">Lesson Link</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if($data1){
						foreach ($data1 as $key1) {
							echo '
								<tr>
									<th scope="row">'.$key1["lesson_id"].'</th>
									<td>'.$key1["lesson_name"].'</td>
									<td>'.$key1["lesson_link"].'</td>
									<td>
										<form action="editLesson" method="POST" class="d-inline">
											<input type="hidden" value='.$key1["lesson_id"].' name="id">
											<button type="submit" class="btn btn-info mr-3" name="view" value="View">
												<i class="fas fa-pen"></i>
											</button>
										</form>
										<form action="" method="POST" class="d-inline">
											<input type="hidden" value='.$key1["lesson_id"].' name="id">
											<button type="submit" class="btn btn-secondary" name="delete" value="Delete">
												<i class="far fa-trash-alt"></i>
											</button>
										</form>
									</td>
								</tr>
							';
						}
					}
					?>
					
				</tbody>
			</table>

			<?php		
				}
			?>
			
			
		</div>
	</div>
	<?php
		if(isset($result['course_id'])) {
	?>
		<div>
			<a class="btn btn-danger box" href="<?php echo $base_url;?>addLesson">
				<i class="fas fa-plus fa-2x"></i>
			</a>
		</div>

	<?php		
		}

		if(isset($_REQUEST['delete'])){
			$data2=$srijan->delete_a_lesson($_REQUEST['id']);
			if($data2){
				echo '<meta http-equiv="refresh" content="300" />';
			}else{
				echo "Unable to delete Data";
			}
		}
	?>

	

</div>
