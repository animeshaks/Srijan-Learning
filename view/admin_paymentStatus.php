<?php
include_once 'admin_header.php';

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

	// following files need to be included
require_once("PaytmKit/lib/config_paytm.php");
require_once("PaytmKit/lib/encdec_paytm.php");

$ORDER_ID = "";
$requestParamList = array();
$responseParamList = array();

if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
	$ORDER_ID = $_POST["ORDER_ID"];

		// Create an array having all required parameters for status query.
	$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
	
	$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
	
	$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
	$responseParamList = getTxnStatusNew($requestParamList);
}

?>


<div class="container-fluid mb-5" style="margin-top: 40px;">
	<div class="row">
		<nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
			<?php
			include_once 'admin_sidebar.php';
			?>
		</nav>
		<div class="col-sm-9 my-4">
			<h2 class="text-center my-4">Payment Status</h2>
			<form method="post" action="">
				<div class="form-group row">
					<center>
						<table>
							<tr>
								<th>Order ID : </</th>
								<th><input type="text" class="form-control" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID; ?>"></th>
								<th><input type="submit" class="btn btn-primary mx-4" value="View" name=""></th>
							</tr>
						</table>
					</center>
				</div>
			</form>

			<br/></br/>
			<?php
			if (isset($responseParamList) && count($responseParamList)>0 )
			{ 
				?>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-12">
							<h2 class="text-center">Payment Recipt</h2>
							<table class="table table-bordered">
								<tbody>
									<?php
									foreach($responseParamList as $paramName => $paramValue) {
										?>
										<tr >
											<td><label><?php echo $paramName?></label></td>
											<td><?php echo $paramValue?></td>
										</tr>
										<?php
									}
									?>
									<tr class="d-print-none">
										<td colspan="2"><button type="button" class="btn btn-primary" onclick="javascript:window.print();">Print</button></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
				<?php
			}
			?>
			
		</div>
	</div>

</div>
