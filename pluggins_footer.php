	<!-- Bootstrap & jquery JavaScript -->
	<script src="<?php echo $base_url;?>assets/js/jquery.min.js"></script>
	<script src="<?php echo $base_url;?>assets/js/popper.min.js"></script>
	<script src="<?php echo $base_url;?>assets/js/bootstrap.min.js"></script>

	<!-- Fontawesome JavaScript -->
	<script src="<?php echo $base_url;?>assets/js/all.min.js"></script>

	<script src='<?php echo $base_url;?>assets/js/owl.carousel.min.js'></script>
	<script src='<?php echo $base_url;?>assets/js/custom.js'></script>
	<script src='<?php echo $base_url;?>assets/js/ajaxrequest.js'></script>
	<script src='<?php echo $base_url;?>assets/js/adminajaxrequest.js'></script>

	<script>
		$(document).ready(function(){
			$(function(){
				$("#playlist li").on("click", function(){
					$("#videoarea").attr({
						src: $(this).attr("movieurl"),
					});
				});
				$("#videoarea").attr({
					src: $("#playlist li").eq(0).attr("movieurl"),
				});
			});
		});
	</script>