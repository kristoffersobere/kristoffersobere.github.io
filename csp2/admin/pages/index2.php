<?php  
function displayadTitle() {
echo "confirmation";
}

function displayadContent() {

	require '../../db/connection.php';
	date_default_timezone_set('ASIA/MANILA');
	$date_now = date("Y-m-d");
	$user = $_SESSION['id'];
	$totalprice = 0;

	$get = "SELECT * FROM transaction JOIN users ON (transaction.user_id = users.id) ";			
	$result = mysqli_query($conn, $get);

	echo '<h2>Bordered Table</h2>
	  <p>The .table-bordered class adds borders to a table:</p>            
	  <table class="table table-bordered " id="dataTables-example">
	    <thead>
	      <tr>
	        <th>Reservation Code</th>
	        <th>Name</th>
	        <th>Date</th>
	        <th>Amount</th>
	        <th>Reference Number</th>
	        <th>Bank</th>
	        <th>Image</th>
	        <th>option</th>
	      </tr>
	    </thead>
	     <tbody id="tbodyconfirm">';

	

	if (mysqli_num_rows($result) > 0 ){
		while ($row = mysqli_fetch_array($result)) {
			$fname = strtoupper($row['firstname']);
			$lname =  strtoupper($row['lastname']);
			$fullname =  $lname .= ', '.$fname;
			$recode =  $row['reserveCode'];
			$date =  $row['date'];
			$amount =  $row['amount'];
			$rnumber =  $row['referencenumber'];
			$bankname =  $row['bankname'];
			$image = $row['image'];
			$status = $row['statuspay'];

		echo '
		      <tr>
		        <td>'.$recode.'</td>
		        <td>'.$fullname.'</td>
		        <td>'.$date.'</td>
		        <td>'.$amount.'</td>
		        <td>'.$rnumber.'</td>
		        <td>'.$bankname.'</td>
		        <td><a href="../../'.$image.'"><img src="../../'.$image.'" style="height: 150px;width: 300px"></a></td>';
		        if ($status == 1) {
		        	echo ' <td text-center><a href="confirm_payment.php?rcode='.$recode.'"><button class="btn btn-lg">Confirm</button></a><a href="cancel_payment.php?rcode='.$recode.'"><button class="btn btn-warning btn-lg">Cancel</button></a></td>
		        	';
		        }elseif ($status == 2) {
		        	echo '<td>CONFIRMED</td>';
		        }elseif ($status == 3) {
		        	echo '<td>CANCELLED</td>';
		        }
		       
		    echo'  </tr>
		  
		   ';

		}

	
		

	}else{
		echo "nodata";
	}

	
echo '</tbody>
  </table>';
}//endfuction

require 'templatead.php';

?>