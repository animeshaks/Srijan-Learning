<?php
    include_once 'td_includes.php';
?>
<!DOCTYPE html>
<html>
<head>
	<?php
    	include_once 'main_title.php';
       	include_once 'pluggins_header.php';        
    ?>
</head>
<body>
	<?php
	    include_once 'header.php';
    
    	if ($_GET['page']=="home" || $_GET['page']=="") {
	    	include_once 'view/srijan_home.php';

	    }elseif ($_GET['page']=="courses") {
	   		include_once 'view/srijan_all_courses.php';

	    }elseif ($_GET['page']=="payment-status") {
	   		include_once 'view/srijan_payment_status.php';

	    }elseif ($_GET['page']=="course-details") {
	   		include_once 'view/srijan_course_detail.php';

	    }
	   	else{
	   		include_once 'view/mvps_error_404.php';
	    }

	   	include_once 'footer.php';
	   	?>
	<?php
		include_once 'pluggins_footer.php';
	?>
</body>
</html>