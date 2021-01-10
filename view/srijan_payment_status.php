<!-- Banner -->
<div class="container-fluid bg-dark">
	<div class="row">
		<img src="<?php echo $base_url;?>assets/images/courseBanner.jpg" alt="courses" style="height: 500px;width: 100%;object-fit: cover;box-shadow: 10px;padding: 0px;">
	</div>
</div>

<!-- Main Content -->
<div class="container">
	<h2 class="text-center my-4">Payment Status</h2>
	<form method="post" action="">
		<div class="form-group row">
			<center>
				<table>
					<tr>
						<th>Order ID : </</th>
						<th><input type="text" class="form-control" name=""></th>
						<th><input type="submit" class="btn btn-primary mx-4" value="View" name=""></th>
					</tr>
				</table>
			</center>
		</div>
	</form>
</div>

<!-- Contact Us -->
<?php
	include_once('view/srijan_contact_form.php')
?>
