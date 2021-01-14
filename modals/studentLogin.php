<!-- Student Login Modal -->
<div class="modal fade" id="StudentLoginModal" tabindex="-1" role="dialog" aria-labelledby="StudentLoginModalCenterTitle" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h5 class="modal-title" id="StudentLoginModalLongTitle">Student Login</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        </button>
	      	</div>
	      	<div class="modal-body">
	        	<form id="stuLoginForm">
	      			<div class="form-group">
	      				<label for="stuLogEmail" class="font-weight-bold"><i class="fas fa-envelope"></i> Email address</label>
	      				<input type="email" class="form-control" id="stuLogEmail" name="stuLogEmail" placeholder="Enter Your Email ID">
	      			</div><br>
	      			<div class="form-group">
	      				<label for="stuLogPass" class="font-weight-bold"><i class="fas fa-key"></i> Password</label>
	      				<input type="password" class="form-control" id="stuLogPass" name="stuLogPass" placeholder="Enter Password">
	      			</div><br>
	      		</form>
	      	</div>
	      	<div class="modal-footer">
	      		<small id="statusLogMsg"></small>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		        <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
	      	</div>
	    </div>
  	</div>
</div>