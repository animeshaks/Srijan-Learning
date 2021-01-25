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
		if($usertype == "admin"){

			if ($_GET['page']=="home" || $_GET['page']=="") {
		    	include_once 'view/admin_dashboard.php';

		    }elseif ($_GET['page']=="courses") {
		   		include_once 'view/admin_courses.php';

		    }elseif ($_GET['page']=="addCourse") {
		   		include_once 'view/admin_addCourse.php';

		    }elseif ($_GET['page']=="logout") {
		   		include_once 'view/logout.php';

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

		    }elseif ($_GET['page']=="logout") {
		   		include_once 'view/logout.php';

		    }
		   	else{
		   		include_once 'view/mvps_error_404.php';
		    }

		   	include_once 'footer.php';
		}

	    
	   	?>
	<?php
		include_once 'pluggins_footer.php';
	?>
</body>
</html>