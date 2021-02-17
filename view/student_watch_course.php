<?php
	if (isset($_GET['slug'])) {
		$course_id = $_GET['slug'];
		//$course_detail = $srijan->fetch_a_course_by_id($course_id);
		$lessons = $srijan->fetch_lessons_by_course_id($course_id);
	}
?>

<div class="container-fluid bg-success p-2">
	<h3>Welcome to SR!JAN Learning</h3>
	<a href="<?php echo $base_url;?>my-courses" class="btn btn-danger">My Courses</a>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 border-right">
			<h4 class="text-center">Lessons</h4>
			<ul id="playlist" class="nav flex-column">
				<?php
					if($lessons){
						foreach ($lessons as $l) {
							echo '<li class="nav-item border-bottom py-2" movieurl='.$l['lesson_link'].' style="cursor:pointer;">'.$l['lesson_name'].'</li>';
						}
					}
				?>
			</ul>
		</div>
		<div class="col-sm-8">
			<video id="videoarea" src="" class="mt-5 w-75 ml-2" controls=""></video>
		</div>
	</div>
</div>


