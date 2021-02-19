<div class="container mt-4 d-print-none" id="contact">
	<h1 class="text-center mb-4">Contact Us</h1>
	<div class="row">
		<div class="col-md-8">
			<form action="" method="post">
				<input type="text" class="form-control" name="name" placeholder="Name"><br>
				<input type="text" class="form-control" name="subject" placeholder="Subject"><br>
				<input type="email" class="form-control" name="email" placeholder="E-mail"><br>
				<textarea class="form-control" name="message" placeholder="How can we help you ?" style="height: 150px;"></textarea><br>
				<input type="submit" class="btn btn-primary" value="SEND" name="submit">
			</form>
		</div>
		<div class="col-md-4 stripe text-white text-center">
			<h4>$R!JAN LEARNING</h4>
			<p>
				$R!JAN LEARNING,
				Bihari colony,New Khursipar,
				Bhilai, PIN - 490011<br>
				Phone - +91 9144585044<br>
				www.anisrijan.netlify.app
			</p>
		</div>
	</div>
</div>

<?php
	if(isset($_REQUEST['submit'])){
		if (($_REQUEST['name'] == "") || ($_REQUEST['subject'] == "") ||($_REQUEST['email'] == "") ||($_REQUEST['message'] == "")) {
			$msg = '<div class="alert alert-warning" role="alert">Fill all fields.</div>';
		}else{
			$name = $_REQUEST['name'];
			$subject = $_REQUEST['subject'];
			$email = $_REQUEST['email'];
			$message = $_REQUEST['message'];

			$mailTo = "animeshshukla98279@gmail.com";
			$headers = "From : ".$email;
			$txt = "You have received an email from ".$name.".\n\n".$message;

			if(mail($mailTo, $subject, $txt, $headers)){
				$msg = '<div class="alert alert-success" role="alert">Sent successfully.</div>';
			}else {
				$msg = '<div class="alert alert-warning" role="alert">Error occured while sending mail.</div>';
			}
			
		}
	}

?>