<?php 
function displayTitle(){
	echo 'myReservation';
	
}

function displayContent() {

	require 'db/connection.php';
	date_default_timezone_set('ASIA/MANILA');

		

	

	$date_now = date("Y-m-d");
	$user = $_SESSION['id'];
	$totalprice = 0;
	$get = "SELECT * FROM reservation WHERE reservationdate >= '$date_now' AND user_id = '$user' ORDER BY reserveid DESC" ;			
	$result = mysqli_query ($conn, $get);
	if (mysqli_num_rows ($result) > 0 ){
		echo "
			<center> <strong> <font color='red'> <h4> PENDING TRANSACTIONS <br> </h4></strong></font> </center>

			<div style='overflow-x:auto;' class = 'col-sm-12'>
			<table width='100%' class='table table-striped table-bordered table-hover' >
				<thead >
				<tr>
				<th > Reservation Code </th>
				<th > Check In Date </th>
				<th > Total </th>
				<th > Balance </th>
				<th > Reservation Status </th>
				<th>  Option </th>
				</tr>
			</thead>";

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

			echo "<tbody>";

			echo "<tr >";
			echo "<td >" . $rcode . "</td>";
			echo "<td >" . date("F j, Y", strtotime($checkin)) . "</td>";
			echo "<td >₱ " . number_format($total,2) . "</td>";
			echo "<td >₱ " . number_format($balance,2) . "</td>";
			if($status == 'Cancelled'){
			echo'	<td ><strong><font color="red">Cancelled</font></strong></td>';	
			}
			else if($status == 'Pending'){
			echo'<td ><strong><font color="orange">Pending</font></strong></td>';	
			}
			else if($status == 'Waiting for Confirmation'){
			echo'<td  ><strong><font color="gray">Waiting for Confirmation</font></strong></td>';	
			}
			else if($status == 'Confirmed'){
			echo'<td ><strong><font color="green">Confirmed</font></strong></td>';	
			}
			else if($status == 'Checked-in'){
			echo'<td ><strong><font color="green">Checked-in</font></strong></td>';	
			}
			else if($status == 'Checked-out'){
			echo'<td ><strong><font color="green">Checked-out</font></strong></td>';	
			}
			else if($status == 'Finished'){
			echo'<td ><strong><font color="green">Finished</font></strong></td>';	
			}
			else{
			echo "<td >" . $status . "</td>";
			}

			echo '<td >';

			if($status == 'Pending' ){
			 echo '<a type="button"  href="reservationdetails.php?rcode='.$rcode.'" class="btn btn-info ">Details</a>';

			 echo '<button class="btn btn-primary" id = "pay" data-toggle="modal" data-target="#myModalPay" data-index="'.$rcode.'">Pay</button>';

			 // echo ' <a type="button" data-toggle="modal" href="finalpaymentfacilities.php?tranID='.$rcode.'" class="btn btn-warning waves-dark"> Pay</a> ';
			echo ' <a type="button"  href="cancel_reservation.php?rcode='.$rcode.'" class="btn btn-danger waves-dark confirmation">Cancel</a>';
			echo '</td>';
				}elseif ($status == 'Waiting for Confirmation') {
					 echo '<a type="button"  href="reservationdetails.php?rcode='.$rcode.'" class="btn btn-info ">Details</a>';
				}
		echo "</tr>";
		}
		
echo "</tbody>";
echo "</table>";



}else {
	echo "<a href='Homepage.php'><button class='btn'> RESERVE NOW!</button></a>";
}
echo '</div>';



}//end  displayfunction
require 'template.php';

echo '<!-- Modal -->
			<div id="myModalPay" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Modal Header</h4>
			      </div>
			      <div class="modal-body" id="modal-body-pay">
			        <div class="row">

	

			     </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
			</div>';

 ?>