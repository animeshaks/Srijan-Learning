<!-- Start Course Page Banner -->
<div class="container-fluid bg-dark">
	<div class="row">
		<img src="<?php echo $base_url;?>assets/images/courseBanner.jpg" alt="courses" style="height: 500px;width: 100%;object-fit: cover;box-shadow: 10px;padding: 0px;">
	</div>
</div>
<!-- End Course Page Banner -->

<!-- Start All Course Section -->
<br>
<div class="container jumbotron">
	<br>
	<div class="row">
		<div class="col-md-4">
			<h5 class="mb-3">If Already Registered !! Login</h5>
			<br>
			<form role="form" id="stuLoginForm">
				<div class="form-group">
	      			<label for="stuLogEmail" class="font-weight-bold"><i class="fas fa-envelope"></i> Email address</label>
	      			<input type="email" class="form-control" id="stuLogEmail" name="stuLogEmail" placeholder="Enter Your Email ID">
	      		</div><br>
	      		<div class="form-group">
	      			<label for="stuLogPass" class="font-weight-bold"><i class="fas fa-key"></i> Password</label>
	     			<input type="password" class="form-control" id="stuLogPass" name="stuLogPass" placeholder="Enter Password">
	     			<br>
	     			<button type="button" class="btn btn-primary float-right" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
	      		</div>
			</form>
			<small id="statusLogMsg"></small>
		</div>
		<div class="col-md-6 offset-md-1">
			<h5 class="mb-3">New User !! Sign Up</h5>
			<br>
			<form role="form" id="stuRegForm">
				<div class="form-group">
	      				<label for="stuname" class="font-weight-bold"><i class="fas fa-user"></i> Name</label>
	      				<small id="statusMsgName"></small>
	      				<input type="text" class="form-control" id="stuname" name="stuname" placeholder="Enter Your Name">
	      			</div><br>
	      			<div class="form-group">
	      				<label for="stuemail" class="font-weight-bold"><i class="fas fa-envelope"></i> Email address</label>
	      				<small id="statusMsgEmail"></small>
	      				<input type="email" class="form-control" id="stuemail" name="stuemail" placeholder="Enter Your Email ID">
	      				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	      			</div><br>
	      			<div class="form-group">
	      				<label for="stupass" class="font-weight-bold"><i class="fas fa-key"></i> Password</label>
	      				<small id="statusMsgPassword"></small>
	      				<input type="password" class="form-control" id="stupass" name="stupass" placeholder="Enter Password">
	      			</div><br>
	      			<div class="form-group">
	      				<label for="confirmstupass" class="font-weight-bold"><i class="fas fa-key"></i> Confirm Password</label>
	      				<small id="statusMsgConfirmPassword"></small>
	      				<input type="password" class="form-control" id="confirmstupass" name="confirmstupass" placeholder="Confirm Your Password">
	      			</div>
	      			<br>
	      			
		        <button type="button" class="btn btn-primary float-right mb-2" id="signup" onclick="addStudent()">Sign Up</button>
			</form>
			<span id="registerSuccessMsg"></span>
		</div>
	</div>
</div>
<!-- End All Course Section -->

<!-- Contact Us -->

<?php
	include_once('view/srijan_contact_form.php')
?>