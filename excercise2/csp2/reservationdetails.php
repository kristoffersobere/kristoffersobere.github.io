<?php 

function displayTitle(){
	echo 'myReservation Details';
	
}

function displayContent() {

	require 'db/connection.php';
	$user = $_SESSION['id'];
	$ID = $_GET['rcode'];
	$totalprice = 0;


	$sel = "SELECT * FROM reservationdetails JOIN users ON (reservationdetails.user = users.id)
	JOIN rooms ON (reservationdetails.room_id = rooms.id)
	JOIN reservation ON (reservationdetails.reservationcode = reservation.reservationcode)
	WHERE reservationdetails.reservationcode = '$ID' ORDER BY reservationdetails.reservationcode ";
		$res = mysqli_query($conn,$sel);
		$rname= "";
	while ($row = mysqli_fetch_array($res)) {
		
	$fname = $row['firstname'];
	$lname = $row['lastname'];
	$fullname = $fname.' '.$lname;
	$date = $row['reservationdate'];
	$rname .=  $row['name'].'('.count($rname).'), ';
	$price = $row['totalprice'];
	$totalprice += $row['totalprice'];
	$CheckIn = $row['checkin'];
	$CheckOut = $row['checkout'];
	$address = $row['address'];

	
	
	}
	// echo 'ReservationCode: '.$ID.'<br>';
	// echo 'Room(s): '.$rname.'<br>';
	// echo 'GuestName: '.$fullname.'<br>';
	// echo 'Total Price: '.$totalprice.'<br>';
	// echo 'Date: '.$date.'<br>';
	// echo 'CheckIn: '.$CheckIn;
	// echo 'CheckOut: '.$CheckOut;

	echo '
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Details</h2><h3 class="pull-right">ReservationCode: '.$ID.'</h3>
    		</div>
    		<hr>
    		<div class="row">
    			
    			<div class="col-xs-6 text-left">
    				<address>
        			<strong>Guest:</strong><br>
    					'.$fullname.'<br>
    					'.$address.'
    					
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			
    			<div class="col-xs-6 text-left">
    				<address>
    					<strong>Reserve Date:</strong><br>
    					'.$date.'<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Rooms</strong></td>
        							<td ><strong>CheckIn</strong></td>
        							<td ><strong></strong>CheckOut</td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>

                                <tr>
        							<td>'.$rname.'</td>
    								<td >'.$CheckIn.'</td>
    								<td >'.$CheckOut.'</td>
    								<td class="text-right">'.$price.'</td>
    							</tr>
                          
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong></strong></td>
    								<td class="no-line text-right"></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">'.$totalprice.'</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
';



	
}//end  displayfunction

require 'template.php';

 ?>