<?php  
require '../../db/connection.php';
$rcode = $_GET['rcode'];
$updt_transaction = "UPDATE transaction SET statuspay = 2 WHERE reserveCode = '$rcode'";
mysqli_query($conn, $updt_transaction);

$get = "SELECT * FROM reservation WHERE reservationCode = '$rcode'";			
$result = mysqli_query ($conn, $get);
$rowget = mysqli_fetch_assoc($result);
$user_id = $rowget['user_id'];
$total = $rowget['total'];
$balance = $rowget['balance'];

$newbal = $total - $balance;

$upd_reservation = "UPDATE reservation SET balance = $newbal ,paymentstatus = 2 WHERE reservationcode = '$rcode'";
mysqli_query($conn, $upd_reservation);

//msg
$sel_contact = "SELECT number FROM users WHERE id = $user_id";
$selq = mysqli_query($conn,$sel_contact);
$rowcon = mysqli_fetch_assoc($selq);
$contact = $rowcon['number'];
$msg = "Your payment has been received. Check your account for details. Thank you. Do not reply.";
		

		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 25);
		$arr_post_body = array(
		"message_type" => "SEND",
		"mobile_number" => $contact,
		"shortcode" => "2929068950",
		"message_id" => $randomString,
		"message" => $msg,
		"client_id" => "d926cdd91b55ab3e684fd2870255345d01f2150398e6b63292103021212a0028",
		"secret_key" => "f68d1a0a395cf82bf976571f07c199aad3b533cebf9297f43c45bda614d91a46"
		);

		$query_string = "";
		foreach($arr_post_body as $key => $frow)
		{
		$query_string .= '&'.$key.'='.$frow;
		}
		$URL = "https://post.chikka.com/smsapi/request";
		$curl_handler = curl_init();
		curl_setopt($curl_handler, CURLOPT_URL, $URL);
		curl_setopt($curl_handler, CURLOPT_POST, count($arr_post_body));
		curl_setopt($curl_handler, CURLOPT_POSTFIELDS, $query_string);
		curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl_handler, CURLOPT_SSL_VERIFYPEER, FALSE);
		$response = curl_exec($curl_handler);
		curl_close($curl_handler);

header('location: index2.php');

?>