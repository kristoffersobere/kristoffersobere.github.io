<?php 

function displayTitle(){
	echo 'myReservation';
	
}

function displayContent() {

	echo "<div class='container'>";
	echo "<section>";
	require 'db/connection.php';
	date_default_timezone_set('ASIA/MANILA');
	$date_now = date("Y-m-d");
	$user = $_SESSION['id'];
	$totalprice = 0;
	$get = "SELECT * from reservation where reservationdate <= '$date_now' and user_id = '$user' ORDER BY reserveid DESC" ;			
	$result = mysqli_query ($conn, $get);
	if (mysqli_num_rows ($result) > 0 ){
		echo "
			<center> <strong> <font color='red'> <h4> PENDING TRANSACTIONS <br> </h4></strong></font> </center>
			<table class='table table-bordered'>
			<tr>
			<th> Reservation Code </th>
			<th> Check In Date </th>
			<th> Total </th>
			<th> Balance </th>
			<th> Reservation Status </th>";
			echo "<th> Option </th></tr>";

			while ($row = mysqli_fetch_array ($result)){
			$userID = $row['user_id'];
			$reservationID = $row['reserveid'];
			$rcode = $row['reservationcode'];
			$checkin = $row['checkin'];
			$total = $row['total'];
			$balance = $row['balance'];
			$status = $row['paymentstatus'];

			if($status == 5){
			$status = "Waiting for Confirmation";
			}
			else if($status == 0){
			$status = "Cancelled";										
			}
			else if($status == 2){
			$status = "Confirmed";
			}
			else if($status == 1){
			$status = "Pending";
			}	
			else if($status == 3){
			$status = "Checked-in";
			}
			else if($status == 4){
			$status = "Checked-out";
			}

			echo "<tr>";
			echo "<td>" . $rcode . "</td>";
			echo "<td>" . date("F j, Y", strtotime($checkin)) . "</td>";
			echo "<td>₱ " . number_format($total,2) . "</td>";
			echo "<td>₱ " . number_format($balance,2) . "</td>";
			if($status == 'Cancelled'){
			echo'	<td><strong><font color="red">Cancelled</font></strong></td>';	
			}
			else if($status == 'Pending'){
			echo'<td><strong><font color="orange">Pending</font></strong></td>';	
			}
			else if($status == 'Waiting for Confirmation'){
			echo'<td><strong><font color="gray">Waiting for Confirmation</font></strong></td>';	
			}
			else if($status == 'Confirmed'){
			echo'<td><strong><font color="green">Confirmed</font></strong></td>';	
			}
			else if($status == 'Checked-in'){
			echo'<td><strong><font color="green">Checked-in</font></strong></td>';	
			}
			else if($status == 'Checked-out'){
			echo'<td><strong><font color="green">Checked-out</font></strong></td>';	
			}
			else if($status == 'Finished'){
			echo'<td><strong><font color="green">Finished</font></strong></td>';	
			}
			else{
			echo "<td>" . $status . "</td>";
			}

			echo '<td>';

			if($status == 'Pending' or $status == 'Pending'  or $status == 'Pending' ){
 echo '<a type="button"  href="reservationdetails.php?rcode='.$rcode.'" class="btn btn-info ">Details</a>';
 echo ' <a type="button" data-toggle="modal" href="finalpaymentfacilities.php?tranID='.$rcode.'" class="btn btn-warning waves-dark"> Pay</a>';
echo ' <a type="button"  href="cancel_facilitiesreservation.php?rcode='.$rcode.'" class="btn btn-danger waves-dark confirmation">Cancel</a>';
 }
// if($status == 'Cancelled'){
// echo '<a type="button"  href="viewfacilitiesdetails.php?rcode='.$rcode.'&cancel=1" class="btn btn-info ">Details</a>';
// }

// else if($status == 'Confirmed'){
// //echo '<a type="button" data-toggle="modal" href="#print" class="btn btn-info ">Details</a>';
// echo '<a type="button"  href="viewfacilitiesdetails.php?rcode='.$rcode.'" class="btn btn-info ">Details</a>';
// }
//  else if($status == 'Pending' and $paystat == 12 or $status == 'Pending' and $paystat == 13 or $status == 'Pending' and $paystat == 14){
//  echo '<a type="button"  href="viewfacilitiesdetails.php?rcode='.$rcode.'" class="btn btn-info ">Details</a>';
//  echo ' <a type="button" data-toggle="modal" href="finalpaymentfacilities.php?tranID='.$rcode.'" class="btn btn-warning waves-dark"> Pay</a>';
// echo ' <a type="button"  href="cancel_facilitiesreservation.php?rcode='.$rcode.'" class="btn btn-danger waves-dark confirmation">Cancel</a>';
//  }
// else if($status == 'Pending' and $paystat == 15){
// echo '<a type="button"  href="viewfacilitiesdetails.php?rcode='.$rcode.'" class="btn btn-info ">Details</a>';
// echo ' <a type="button"  href="cancel_reservation.php?rcode='.$rcode.'" class="btn btn-danger waves-dark confirmation">Cancel</a>';
// }
// else if($status == 'Confirmed'){
// echo '<a type="button"  href="viewfacilitiesdetails.php?rcode='.$rcode.'" class="btn btn-info ">Details</a>';
// echo ' <a type="button" data-toggle="modal" href="finalpaymentfacilities.php?tranID='.$rcode.'" class="btn btn-warning waves-dark"> Pay</a>';
// echo ' <a type="button"  href="cancel_facilitiesreservation.php?rcode='.$rcode.'" class="btn btn-danger waves-dark confirmation">Cancel</a>';
// }
// else if($status == 'Checked-in'){
// echo '<a type="button"  href="viewfacilitiesdetails.php?rcode='.$rcode.'" class="btn btn-info ">Details</a>';
// }
// else{
// }
					
	
			
		}
		echo '</td>';
echo "</tr>";
echo "</table>";
}
echo "</section>";
echo "</div>";//container

}//end  displayfunction
require 'template.php';

 ?>