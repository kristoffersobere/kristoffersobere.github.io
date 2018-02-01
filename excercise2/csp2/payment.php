<?php
require 'db/connection.php';
date_default_timezone_set('Asia/Manila');
$rcode = $_POST['rcode'];
$today = date("y-m-d");	

echo "
	<form action='payment_endpoint.php?rcode=$rcode' method='POST' enctype='multipart/form-data'>
<div class='form-group'>												
					<div class='input-group'>
						<div class='input-group-addon'>Date:</div>
						<input type='text' name='datee' id ='datepicker' readonly='readonly'style='cursor:pointer; background-color: #FFFFFF' class='form-control input-md' value='$today' disabled>
						</div>
					</div>
					<div class='form-group'>
						<div class='input-group'>
							<div class='input-group-addon'>Transaction Number:</div>
							<input type= 'text' name='transnum' tabindex='4' class='form-control input-md' placeholder='XXXX-XXXXX-XXXX' >
						</div>
					</div>
					<div class='form-group'>
						<div class='input-group'>
							<div class='input-group-addon'>Amount Deposited:</div>
							<input type= 'number' name='amountdeposited' tabindex='4' class='form-control input-md' placeholder='XXXXXXXXXXX' min='1' >
						</div>
					</div>
					<div class='form-group'>
						<div class='input-group'>
							<div class='input-group-addon'>Bank Name:</div>
							<select name='bankname' tabindex='4' class='form-control input-md' >";
								
							$bank = "SELECT * FROM bankaccount";
							$bankres = mysqli_query($conn, $bank);
							while ($rowbank = mysqli_fetch_array($bankres)) {
								echo "<option value=".$rowbank['accountname'].">".$rowbank['accountname']."</option>";
							}

				echo "	</select>
						</div>
					</div>

					<div class='form-group'>
						<div class='input-group'>
							<div class='input-group-addon'>Upload Image:</div>
							<input type= 'file' name='image' tabindex='4' class='form-control input-md' >
						</div>
					</div>

						<div class='form-group'>
						<div class='input-group'>
							<input type= 'submit' name = 'submit' value ='Submit' tabindex='6' class='btn btn-primary' onclick='alert('sure?')'>
						</div>
					</div>

</form>
";

?>