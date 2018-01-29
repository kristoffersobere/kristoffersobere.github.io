<?php 

function displayTitle(){
	echo 'myReservation Details';
	
}

function displayContent() {

	require 'db/connection.php';
	$user = $_SESSION['id'];
	$ID = $_GET['rcode'];
	$totalprice = 0;


$get = "SELECT * FROM rooms
	LEFT JOIN reservationdetails ON rooms.id = reservationdetails.room_id 
LEFT JOIN reservation ON reservationdetails.reservationcode = reservation.reservationcode
	WHERE reservationdetails.reservationcode='$ID'";


	$result = mysqli_query ($conn, $get);

	if (mysqli_num_rows ($result) > 0 ){
		echo "
	<center> <strong> <font color='blue'> <h4> TRANSACTION DETAILS </h4> </font></strong> </center>
	<center><table class='table table-bordered'>
	<tr>
	
	<th> Item </th>
	<th> Unit Price </th>
	<th> Quantity </th>
	<th> Date </th>
	<th> Time </th>
	<th> Price </th>";
if($cancel == 1){
echo "<th> Remarks </th>";
}
else{
	echo "<th> Option </th>";
}
	echo "</tr>";

	while ($row_b = mysqli_fetch_array ($result)){
$resdetails= $row_b['reservationdetails'];
						$Fname = $row_b['FName'];
						$facilID = $row_b['ID'];
						$Quantity = $row_b['Quantity'];
						$tot = $row_b['Price'];
						$price = $Quantity * $tot;
						$checkin = $row_b['date'];
						$time = $row_b['ResTime'];
							$remarks = $row_b['remarks'];
						$stat = $row_b['status'];
$modcheckin = date('F d Y', strtotime($checkin));

	echo "<tr>";
	
	echo "<td>" . $Fname . "</td>";
	echo "<td>₱".number_format($tot,2)."</td>";
	echo '<td>' . $Quantity . '</td>';
		echo "<td>" . $modcheckin . "</td>";
		echo "<td>" . $time . "</td>";
	echo '<td>₱'.number_format($price,2).'</td>';
	

	if($cancel == 1){
	echo "<td>" . $remarks . "</td></tr>";
}
else{

	if($stat == 5){
	echo '<td> 	<a type="button"  href="cancelreservefacilities.php?ID='.$resdetails.'&rcode='.$ID.'&date='.$checkin.'&time='.$time.'&quantity='.$Quantity.'&cancelID='.$facilID.'" class="btn btn-danger confirmation">Cancel</a></td></tr>';
}
}
	}
	echo "</table><br></center>";
	}
	else {
		echo "eww";
	}
	
}//end  displayfunction

require 'template.php';

 ?>