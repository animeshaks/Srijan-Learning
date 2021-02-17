<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	$stuEmail = $_SESSION['useremail'];
?>

<div class="container mt-5">
	<div class="row">
		<div class="col-sm-6 offset-sm-3 jumbotron">
			<br>
			<h3 class="mb-5 text-center">Welcome to $R!JAN Learning Payment Page</h3>
			<form method="post" action="payment-page-redirect">
				<div class="form-group row">
					<label for="ORDER_ID" class="col-sm-4 col-form-lable">Order Id</label>
					<div class="col-sm-8">
						<input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo "ORDS".rand(10000,999999999) ?>" readonly>
					</div>
				</div>
				<br>
				<div class="form-group row">
					<label for="CUST_ID" class="col-sm-4 col-form-lable">Student Email</label>
					<div class="col-sm-8">
						<input id="CUST_ID" class="form-control" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php if(isset($stuEmail)){echo $stuEmail; } ?>" readonly>
					</div>
					
				</div>
				<br>
				<div class="form-group row">
					<label for="TXN_AMOUNT" class="col-sm-4 col-form-lable">Amount</label>
					<div class="col-sm-8">
						<input id="TXN_AMOUNT" class="form-control" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php if(isset($_POST['course_price'])){echo $_POST['course_price']; } ?>" readonly>
					</div>
				</div>
				<br>
				<div class="form-group row">
					<!-- <label for="INDUSTRY_TYPE_ID" class="col-sm-4 col-form-lable">Industry Type Id</label> -->
					<div class="col-sm-8">
						<input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" class="form-control" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
					</div>
				</div>
				<div class="form-group row">
					<!-- <label for="CHANNEL_ID" class="col-sm-4 col-form-lable">Channel Id</label> -->
					<div class="col-sm-8">
						<input type="hidden" id="CHANNEL_ID" class="form-control" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</div>
					<br>
				</div>
				<div class="text-center">
					<input type="submit" value="Check out" class="btn btn-primary" onclick="" name="">
					<a href="<?php echo $base_url;?>courses" class="btn btn-secondary">Cancel</a>
				</div>
			</form>
			<small class="form-text text-muted mb-5">Note : Complete Payment by clicking Checkout Button</small>
			<br><br>
		</div>
	</div>
</div>