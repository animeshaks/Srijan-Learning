<?php
	include_once 'student_header.php';
	if (isset($_GET['slug'])) {
		$course_id = $_GET['slug'];
		//$course_detail = $srijan->fetch_a_course_by_id($course_id);
		$lessons = $srijan->fetch_lessons_by_course_id($course_id);
	}
?>

<div class="container-fluid mb-5" style="margin-top: 40px;">
	<div class="row">
		<nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
			<?php
			include_once 'student_sidebar.php';
			?>
		</nav>
		<div class="col-sm-9 my-5 mx-3 jumbotron">
			<br>
			<!-- Main Content -->
			<table class="table">
				<thead>
					<tr>
						<th scope="col">S.no.</th>
						<th scope="col">Lesson Name</th>
						<th scope="col">Lesson Description</th>
						<th scope="col">View</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if($lessons){
						foreach ($lessons as $key1) {
							?>
								<tr>
									<th scope="row"><?php echo $key1["lesson_id"]; ?></th>
									<td><?php echo $key1["lesson_name"]; ?></td>
									<td><?php echo $key1["lesson_desc"]; ?></td>
									<td><!-- <a class="btn btn-info mr-3" href="" name="view" data-toggle="modal" data-target="#VideoModal" value="View"><i class="fas fa-pen"></i></a> -->
										<video style="height: 200px;width: 300px;" src="<?php echo $base_url.$key1['lesson_link']; ?>" class="mt-5 w-75 ml-2" controls></video>
									</td>
								</tr>

								<div class="modal fade" id="VideoModal" tabindex="-1" role="dialog" aria-labelledby="AdminLoginModalCenterTitle" aria-hidden="true">
								  	<div class="modal-dialog modal-dialog-centered" role="document">
									    <div class="modal-content">
									      	<div class="modal-header">
										        <h5 class="modal-title" id="AdminLoginModalLongTitle">Title</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          	<span aria-hidden="true">&times;</span>
										        </button>
									      	</div>
									      	<div class="modal-body">

									      	</div>
									    </div>
								  	</div>
								</div> 
						<?php
							
						}
					}
					?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>






