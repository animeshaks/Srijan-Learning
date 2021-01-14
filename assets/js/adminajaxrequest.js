//Ajax call for Admin Login Verification
function checkAdminLogin(){
	var adminLogEmail = $("#adminLogEmail").val();
	var adminLogPass = $("#adminLogPass").val();
	$.ajax({
		url: 'api/loginUser.php',
		method: 'POST',
		data: {
			adminLogEmail: adminLogEmail,
			adminLogPass: adminLogPass,
			action: "chk_admin_login",
		},
		success: function(data){
			if(data == 0){
				$("#statusLogMsgAdmin").html('<small class="alert alert-danger">Invalid Email ID or Password</small>');
			}else if(data == 1){
				$("#statusLogMsgAdmin").html('<div class="spinner-border text-success" role="status"></div>');
				setTimeout(() => {
					location.reload();
				},1000);
			}
		}
	});
}