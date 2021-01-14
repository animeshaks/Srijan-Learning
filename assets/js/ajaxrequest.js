$(document).ready(function() {
	// Ajax call from Already exists email verification
	$("#stuemail").on("keypress blur", function() {
		var regEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		var stuemail = $("#stuemail").val();
		$.ajax({
			url: 'api/addStudent.php',
			method: 'POST',
			data: {
				checkemail: "checkemail",
				stuemail: stuemail,
			},
			success: function(data){
				console.log(data);
				if(data != 0){
					$("#statusMsgEmail").html("<small style='color:#ff0000;'>Email ID Already Exists!</small>");
					$("#signup").attr("disabled", true);
				}else if(!regEmail.test(stuemail)){
					$("#statusMsgEmail").html("<small style='color:#ff0000;'>Please Enter Valid Email ID eg. example@mail.com!</small>");
					$("#signup").attr("disabled", true);
				}else if(data == 0){
					$("#statusMsgEmail").html("<small style='color:green;'>There You Go!</small>");
					$("#signup").attr("disabled", false);
				}
			},
		});
	});
});


function addStudent(){
	var regEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	var stuname = $("#stuname").val();
	var stuemail = $("#stuemail").val();
	var stupass = $("#stupass").val();
	var confirmstupass = $("#confirmstupass").val();

	//Validation
	if(stuname.trim()==""){
		$("#statusMsgName").html("<small style='color:#ff0000;'>Please Enter Name !</small>");
		$("#stuname").focus();
		return false;

	}else if(stuemail.trim()==""){
		$("#statusMsgEmail").html("<small style='color:#ff0000;'>Please Enter Email ID !</small>");
		$("#stuemail").focus();
		return false;

	}else if(stuemail.trim()!="" && !regEmail.test(stuemail)){
		$("#statusMsgEmail").html("<small style='color:#ff0000;'>Please Enter Valid Email ID eg. example@mail.com</small>");
		$("#stuemail").focus();
		return false;

	}else if(stupass.trim()==""){
		$("#statusMsgPassword").html("<small style='color:#ff0000;'>Please Enter Password !</small>");
		$("#stupass").focus();
		return false;

	}else if(confirmstupass.trim()!=stupass.trim()){
		$("#statusMsgConfirmPassword").html("<small style='color:#ff0000;'>Password and confirm password should be same !</small>");
		$("#confirmstupass").focus();
		return false;
	}else{
		$.ajax({
			url: 'api/addStudent.php',
			method: 'POST',
			dataType: 'json',
			data:{
				stusignup: "stusignup",
				stuname: stuname,
				stuemail: stuemail,
				stupass: stupass,
				confirmstupass: confirmstupass
			},
			success:function(data){
				console.log(data);
				if(data == "Ok"){
					$("#registerSuccessMsg").html("<span class='alert alert-success'>Registration Successful !</span>");
					clearStudentRegFields();
				}else if(data == "Failed"){
					$("#registerSuccessMsg").html("<span class='alert alert-danger'>Unable to Register</span>");
				}
			}
		});
	}
}

//Empty Fields
function clearStudentRegFields(){
	$("#stuRegForm").trigger("reset");
	$("#statusMsgName").html("");
	$("#statusMsgEmail").html("");
	$("#statusMsgPassword").html("");
	$("#statusMsgConfirmPassword").html("");
}

//Ajax call for Student Login Verification
function checkStuLogin(){
	var stuLogEmail = $("#stuLogEmail").val();
	var stuLogPass = $("#stuLogPass").val();
	$.ajax({
		url: 'api/loginUser.php',
		method: 'POST',
		data: {
			checkLogemail: "checklogmail",
			stuLogEmail: stuLogEmail,
			stuLogPass: stuLogPass,
		},
		success: function(data){
			if(data == 0){
				$("#statusLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password</small>');
			}else if(data == 1){
				$("#statusLogMsg").html('<div class="spinner-border text-success" role="status"></div>');
				setTimeout(() => {
					location.reload();
				},1000);
			}
		}
	});
}