<?php  
session_start();
require 'db/connection.php';
$today = date("y-m-d");	
$user_id = $_SESSION['id'];

$target_dir = "assets/receipts/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

$rcode = htmlspecialchars($_GET['rcode']);
$transnum = htmlspecialchars($_POST['transnum']);
$amount = htmlspecialchars($_POST['amountdeposited']);
$bankname = htmlspecialchars($_POST['bankname']);
$photo = $target_file; 

$ins_trans = "INSERT INTO transaction (reserveCode, user_id, date, amount, referencenumber, bankname, image, statuspay) VALUES ('$rcode', '$user_id', '$today', '$amount', '$transnum', '$bankname', '$photo', 1)";
$insres = mysqli_query($conn, $ins_trans);

$upd_reservation = "UPDATE reservation SET paymentstatus = 5 WHERE reservationcode = '$rcode'";
$updres = mysqli_query($conn, $upd_reservation);

$sel_contact = "SELECT number FROM users WHERE id = $user_id";
$selq = mysqli_query($conn,$sel_contact);
$rowcon = mysqli_fetch_assoc($selq);
$contact = $rowcon['number'];
//bowchikawow
$msg = "Thankyou. A text message will be sent after the Admin confirms your payment. Thank you. Do not reply.";
		

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

header('location: myreservation.php');
?>