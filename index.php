<?php
    include_once 'includes.php';
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		if($usertype == "admin"){
			include_once 'admin_title.php';
       		include_once 'admin_pluggins_header.php';  
		}else{
			include_once 'main_title.php';
       		include_once 'pluggins_header.php';
		}
    	        
    ?>
</head>
<body>
	<?php
		if($usertype == 'admin'){

			if ($_GET['page']=="home" || $_GET['page']=="") {
		    	include_once 'view/admin_dashboard.php';

		    }elseif ($_GET['page']=="courses") {
		   		include_once 'view/admin_courses.php';

		    }elseif ($_GET['page']=="addCourse") {
		   		include_once 'view/admin_addCourse.php';

		    }elseif ($_GET['page']=="editCourse") {
		   		include_once 'view/admin_editCourse.php';

		    }elseif ($_GET['page']=="students") {
		   		include_once 'view/admin_students.php';

		    }elseif ($_GET['page']=="addNewStudent") {
		   		include_once 'view/admin_addNewStudent.php';

		    }elseif ($_GET['page']=="editStudentDetail") {
		   		include_once 'view/admin_editStudentDetail.php';

		    }elseif ($_GET['page']=="lessons") {
		   		include_once 'view/admin_lessons.php';

		    }elseif ($_GET['page']=="addLesson") {
		   		include_once 'view/admin_addLesson.php';

		    }elseif ($_GET['page']=="editLesson") {
		   		include_once 'view/admin_editLesson.php';

		    }elseif ($_GET['page']=="changePassword") {
		   		include_once 'view/admin_changePassword.php';

		    }elseif ($_GET['page']=="feedback") {
		   		include_once 'view/admin_feedback.php';

		    }elseif ($_GET['page']=="payment-status") {
		   		include_once 'view/admin_paymentStatus.php';

		    }elseif ($_GET['page']=="sell-report") {
		   		include_once 'view/admin_sellReport.php';

		    }elseif ($_GET['page']=="logout") {
		   		include_once 'view/logout.php';

		    }else{
		    	include_once 'view/srijan_error_404.php';
		    }
		}else if($usertype == 'student'){
    
	    	if ($_GET['page']=="home" || $_GET['page']=="") {
	    		include_once 'header.php';
		    	include_once 'view/srijan_home.php';
		    	include_once 'footer.php';

		    }elseif ($_GET['page']=="checkout") {
		    	include_once 'header.php';
		   		include_once 'view/payment_checkout.php';
		   		include_once 'footer.php';

		    }elseif ($_GET['page']=="payment-page-redirect") {
		   		include_once 'PaytmKit/pgRedirect.php';

		    }elseif ($_GET['page']=="payment-page-response") {
		   		include_once 'PaytmKit/pgResponse.php';

		    }elseif ($_GET['page']=="courses") {
		   		include_once 'view/srijan_all_courses.php';

		    }elseif ($_GET['page']=="my-courses") {
		   		include_once 'view/student_all_courses.php';

		    }elseif ($_GET['page']=="watch-course") {
		   		include_once 'view/student_watch_course.php';

		    }elseif ($_GET['page']=="course-details") {
		   		include_once 'view/srijan_course_detail.php';

		    }elseif ($_GET['page']=="student-profile") {
		   		include_once 'view/student_profile.php';

		    }elseif ($_GET['page']=="student-feedback") {
		   		include_once 'view/student_feedback.php';

		    }elseif ($_GET['page']=="changePassword") {
		   		include_once 'view/student_changePassword.php';

		    }elseif ($_GET['page']=="logout") {
		   		include_once 'view/logout.php';

		    }else{
		    	include_once 'view/srijan_error_404.php';
		    }
		   	
		}else{
			include_once 'header.php';
    
	    	if ($_GET['page']=="home" || $_GET['page']=="") {
		    	include_once 'view/srijan_home.php';

		    }elseif ($_GET['page']=="courses") {
		   		include_once 'view/srijan_all_courses.php';

		    }elseif ($_GET['page']=="payment-status") {
		   		include_once 'view/srijan_payment_status.php';

		    }elseif ($_GET['page']=="course-details") {
		   		include_once 'view/srijan_course_detail.php';

		    }elseif ($_GET['page']=="payment-page-response") {
		   		include_once 'PaytmKit/pgResponse.php';

		    }elseif ($_GET['page']=="checkout") {
		   		include_once 'view/srijan_login_or_signup.php';

		    }elseif ($_GET['page']=="logout") {
		   		include_once 'view/logout.php';

		    }else{
		    	include_once 'view/srijan_error_404.php';
		    }

		   	include_once 'footer.php';
		}

	    
	   	?>
	<?php
		include_once 'pluggins_footer.php';
	?>
</body>
</html>