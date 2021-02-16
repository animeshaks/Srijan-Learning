<?php
	include_once 'admin_header.php';
?>

<?php
	$data=$srijan->fetch_all_feedback();
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
			<p class="bg-dark text-white p-2">List Of Feedbacks</p>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Feedback</th>
						<th scope="col">E-mail</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $key) {
						echo '
							<tr>
								<th scope="row">'.$key["f_id"].'</th>
								<td>'.$key["f_content"].'</td>
								<td>'.$key["stu_email"].'</td>
								<td>
									<form action="" method="POST" class="d-inline">
										<input type="hidden" value='.$key["f_id"].' name="f_id">
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

</div>

<?php
	if(isset($_REQUEST['delete'])){
		$data1=$srijan->delete_a_feedback($_REQUEST['f_id']);
		if($data1){
			echo '<meta http-equiv="refresh" content="300" />';
		}else{
			echo "Unable to delete Data";
		}
	}
?>