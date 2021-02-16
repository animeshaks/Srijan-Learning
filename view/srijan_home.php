<!-- Start Video Background -->
<div class="container-fluid remove-vid-margin">
	<div class="vid-parent">
		<video playesinline autoplay muted loop>
			<source src="<?php echo $base_url;?>assets/videos/home_backgroung_vid.mp4">
		</video>
		<div class="vid-overlay"></div>
	</div>
	<div class="vid-content">
		<h1 class="my-content">Welcome to $R!JAN LEARNING</h1>
		<small class="my-content">Learn and Implement</small>
		<br>
		
		<?php 
			if(!isset($_SESSION['is_login'])){
		?>
		<a href="#" class="btn btn-danger mt-3" data-toggle="modal" data-target="#StudentRegstrationModal">Get Started</a>
		<?php 
			}else{
		?>
		<a href="<?php echo $base_url;?>student-profile" class="btn btn-primary mt-3">My Profile</a>
		<?php 
			}
		?>
		
	</div>
</div>
<!-- End Video Background -->

<!-- Start Text Banner -->
<div class="container-fluid bg-danger txt-banner">
	<div class="row bottom-banner">
		<div class="col-md-3 col-6">
			<h5>
				<i class="fas fa-book-open mr-3"></i>
				100+ Online Courses
			</h5>
		</div>
		<div class="col-md-3 col-6">
			<h5>
				<i class="fas fa-users mr-3"></i>
				Expert Instructors
			</h5>
		</div>
		<div class="col-md-3 col-6">
			<h5>
				<i class="fas fa-keyboard mr-3"></i>
				Lifetime Access
			</h5>
		</div>
		<div class="col-md-3 col-6">
			<h5>
				<i class="fas fa-rupee-sign mr-3"></i>
				Money Back Gaurantee*
			</h5>
		</div>
	</div>
</div>
<!-- End Text Banner -->

<!-- Start Course Section -->
<div class="container mt-5">
	<h1 class="text-center">Popular Courses</h1>
	<?php
		$courses = $srijan->fetch_top_courses();
	?>
	<div class="row">
		<?php
			foreach ($courses as $data) {	
		?>
			<div class="card-deck mt-4 col-md-4 col-sm-6 col-12">
				<a href="#" class="btn" style="text-align: left;padding: 0px;margin: 0px;">
					<div class="card">
						<img src="<?php echo $data['course_img'];?>" height="250px" class="card-img-top" alt="Guitar" />
						<div class="card-body">
							<h5><?php echo $data['course_name'];?></h5>
							<p><?php echo $data['course_desc'];?></p>
						</div>
						<div class="card-footer">
							<p class="card-text d-inline">
								Price : <small><del>&#8377 <?php echo $data['course_original_price'];?></del></small> <span class="font-weight-bolder">&#8377 <?php echo $data['course_price'];?></span>
							</p>
							<a class="btn btn-primary text-white font-weight-bolder float-right" href="<?php echo $base_url;?>course-details/<?php echo $data['course_id'];?>">Enroll</a>
						</div>
					</div>
				</a>
			</div>
		<?php
			}
		?>
	</div>
	
	<div class="text-center m-2">
		<a class="btn btn-danger btn-sm" href="<?php echo $base_url;?>courses">View All Courses</a>
	</div>
</div>
<!-- End Course Section -->

<!-- Start Contact Us -->
<?php
	include_once('view/srijan_contact_form.php')
?>
<!-- End Contact US -->

<!-- Start Testimonial -->
<div class="gtco-testimonials" id="feedback">
	<h2>Student's Feedback</h2>
	<?php
		$feedbacks = $srijan->fetch_all_home_feedback();
	?>
	<div class="owl-carousel owl-carousel1 owl-theme">
		<?php
			foreach ($feedbacks as $dat) {	
		?>
		<div>
			<div class="card text-center"><img class="card-img-top" src="<?php echo $dat['stu_img'];?>" alt="">
				<div class="card-body">
					<h5><?php echo $dat['stu_name'];?><br />
						<span><?php echo $dat['stu_occ'];?></span>
					</h5>
					<p class="card-text">“ <?php echo $dat['f_content'];?> ” </p>
				</div>
			</div>
		</div>
		<?php
			}
		?>
		<div>
			<div class="card text-center"><img class="card-img-top" src="https://images.unsplash.com/photo-1588361035994-295e21daa761?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=50&w=301" alt="">
				<div class="card-body">
					<h5>Missy Limana<br />
						<span> Engineer </span>
					</h5>
					<p class="card-text">“ Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat ” </p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Testimonial   -->

<!-- Start Soocial Media -->
<div class="container-fluid bg-danger">
	<div class="row text-white text-center p-2">
		<div class="col-md-3 col-6">
			<a href="#" class="text-white social-hover">
				<i class="fab fa-facebook"></i>
				 Facebook
			</a>
		</div>
		<div class="col-md-3 col-6">
			<a href="#" class="text-white social-hover">
				<i class="fab fa-twitter"></i>
				 Twitter
			</a>
		</div>
		<div class="col-md-3 col-6">
			<a href="#" class="text-white social-hover">
				<i class="fab fa-whatsapp"></i>
				 Whatsapp
			</a>
		</div>
		<div class="col-md-3 col-6">
			<a href="#" class="text-white social-hover">
				<i class="fab fa-instagram"></i>
				 Instagram
			</a>
		</div>
	</div>
</div>
<!-- End Soocial Media -->

<!-- Start About Us -->
<div class="container-fluid p-4" style="background-color: #E9ECEF;">
	<div class="container" style="background-color: #E9ECEF;">
		<div class="row text-center">
			<div class="col-sm">
				<h5>About Us</h5>
				<p>$R!JAN LEARNING provides universal access to the world's best education, partnering with top universities and organizations to offer course online.</p>
			</div>
			<div class="col-sm">
				<h5>Category</h5>
				<a href="#" class="text-dark">Web Development</a><br>
				<a href="#" class="text-dark">Web Designing</a><br>
				<a href="#" class="text-dark">Android Development</a><br>
				<a href="#" class="text-dark">iOS Development</a><br>
				<a href="#" class="text-dark">Data Analysis</a><br>
			</div>
			<div class="col-sm">
				<h5>Contact Us</h5>
				<p>$R!JAN LEARNING,<br>
				Bihari colony,New Khursipar,<br>
				Bhilai, PIN - 490011<br>
				Phone - +91 9144585044<br>
				www.anisrijan.netlify.app</p>
			</div>
		</div>
	</div>
</div>
<!-- End About Us -->





