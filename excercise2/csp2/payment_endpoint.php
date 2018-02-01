<?php  
session_start();
require 'db/connection.php';
$today = date("y-m-d");	
$user_id = $_SESSION['id'];

$target_dir = "assets/receipts/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

$rcode = $_GET['rcode'];
$transnum = $_POST['transnum'];
$amount = $_POST['amountdeposited'];
$bankname = $_POST['bankname'];
$photo = $target_file; 




$ins_trans = "INSERT INTO transaction (reserveCode, user_id, date, amount, referencenumber, bankname, image, status) VALUES ('$rcode', '$user_id', '$today', '$amount', '$transnum', '$bankname', '$photo', 1)";
$insres = mysqli_query($conn, $ins_trans);

$upd_reservation = "UPDATE reservation SET paymentstatus = 5 WHERE reservationcode = '$rcode'";
$updres = mysqli_query($conn, $upd_reservation);

header('location: myreservation.php');
?>