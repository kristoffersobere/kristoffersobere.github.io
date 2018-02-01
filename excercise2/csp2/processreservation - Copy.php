<?php  
require 'db/connection.php';
session_start();
//259200 - 3days
//3*60*60*24 - 1day
//60 -mins
	date_default_timezone_set('Asia/Manila');
	$datetime = date("Y-m-d H:i:s");	
	$user_id = $_SESSION['id'];	
	$date = new DateTime();
	$today = date("y-m-d");		
	$random_hash = substr(md5(uniqid(rand(), true)), 16, 7);
	$code = "GGWP-".strtoupper ($random_hash);
	
	$user = $_SESSION['id'];
	$firstname = $_SESSION['firstname'];
	$lastname = $_SESSION['lastname'];
	$fullname = $lastname . " " . $firstname;
	$total = $_POST['total'];
	$checkin = $_POST['checkin'];
	$checkout = $_POST['checkout'];
	$bal = $total/2;



	$insert = "INSERT INTO reservation(reservationcode, user_id, total, balance, dp,  paymentstatus,  checkin, checkout, reservationdate)
		VALUES('$code','$user_id','$total','$total','$bal', 1, '$checkin', '$checkout', '$today')";
		$que = mysqli_query($conn, $insert)or die(mysql_error());


	if (isset($_SESSION['cart'])) {
                    $qtty = $_SESSION['cart'];
           
                    
                    
                    foreach ($qtty as $index => $q) {

                            
                        $ins_details = "INSERT INTO reservationdetails(reservationcode,user,room_id,checkin,checkout, qty, totalprice)
						VALUES('$code','$user','$index','$checkin','$checkout','$q','$total')";
							$details_que = mysqli_query($conn, $ins_details)or die(mysql_error());
                           
                                                               
                            
                          }  
                          
                        } 

	unset($_SESSION["cart"]);
	header("location: myreservation.php");
?>