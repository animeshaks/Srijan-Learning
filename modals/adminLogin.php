<!-- Admin Login Modal -->
<div class="modal fade" id="AdminLoginModal" tabindex="-1" role="dialog" aria-labelledby="AdminLoginModalCenterTitle" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h5 class="modal-title" id="AdminLoginModalLongTitle">Admin Login</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        </button>
	      	</div>
	      	<div class="modal-body">
	        	<form id="stuLoginForm">
	      			<div class="form-group">
	      				<label for="adminLogEmail" class="font-weight-bold"><i class="fas fa-envelope"></i> Email address</label>
	      				<input type="email" class="form-control" id="adminLogEmail" name="adminLogEmail" placeholder="Enter Your Email ID">
	      			</div><br>
	      			<div class="form-group">
	      				<label for="adminLogPass" class="font-weight-bold"><i class="fas fa-key"></i> Password</label>
	      				<input type="password" class="form-control" id="adminLogPass" name="adminLogPass" placeholder="Enter Password">
	      			</div><br>
	      		</form>
	      	</div>
	      	<div class="modal-footer">
	      		<small id="statusLogMsgAdmin"></small>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		        <button type="button" class="btn btn-primary" id="adminLoginBtn" onclick="checkAdminLogin()">Login</button>
	      	</div>
	    </div>
  	</div>
</div> 