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
                    	$rooms = "SELECT id,qty FROM rooms  WHERE id = $index";
                    	$resrooms = mysqli_query($conn, $rooms);
                    	$rowrooms = mysqli_fetch_array($resrooms);
                    	$id_rooms = $rowrooms['id'];
                    	$q_rooms = $rowrooms['qty'];

                            
             	 		$ins_details = "INSERT INTO reservationdetails(reservationcode,user,room_id,checkin,checkout, qty, totalprice)
						VALUES('$code','$user','$index','$checkin','$checkout','$q','$total')";
						$details_que = mysqli_query($conn, $ins_details)or die(mysql_error());
                           
                        /////////////sorry wala n time dko na najoin
						$sel = "SELECT * FROM availability WHERE room_id = $id_rooms AND checkin='$checkin' AND checkout='$checkout'";
						$sel_que = mysqli_query($conn, $sel);
						$count = mysqli_num_rows($sel_que);
						$row = mysqli_fetch_array($sel_que);
						$avail_quan = $row['qty'];
						$id = $row['id'];

							
						$tot_quan = 0;

						if ($count > 0) {
							//echo 'meron';
							
							$tot_quan = $avail_quan - $q;
							$update = "UPDATE availability SET qty=$tot_quan WHERE id = $id AND checkin='$checkin' AND checkout='$checkout'";
							$upd_que = mysqli_query($conn, $update);
							
							if ($upd_que) {

							}
						}
						else{
							//echo "wla";
							$quan_a = $q_rooms - $q;
							$insert_a = "INSERT INTO availability(room_id, checkin, checkout, qty)
								VALUES($index, '$checkin', '$checkout',$quan_a)";
							$inserta_que = mysqli_query($conn, $insert_a);
							if ($inserta_que) {
								
							}
						}

                            
                          }//endngforeach
                          
                        }//endngif 

	unset($_SESSION["cart"]);
	header("location: myreservation.php");
?>