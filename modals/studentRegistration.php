<!-- Student Registration Modal -->
<div class="modal fade" id="StudentRegstrationModal" tabindex="-1" role="dialog" aria-labelledby="StudentRegistrationModalCenterTitle" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h5 class="modal-title" id="StudentRegistrationModalLongTitle">Student Registration</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        </button>
	      	</div>
	      	<div class="modal-body">
	        	<form id="stuRegForm">
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
	      		</form>
	      	</div>
	      	<div class="modal-footer">
	      		<span id="registerSuccessMsg"></span>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" id="signup" onclick="addStudent()">Sign Up</button>
	      	</div>
	    </div>
  	</div>
</div>