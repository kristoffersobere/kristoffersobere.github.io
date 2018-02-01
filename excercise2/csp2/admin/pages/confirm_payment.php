<?php  
require '../../db/connection.php';
$rcode = $_GET['rcode'];
$updt_transaction = "UPDATE transaction SET statuspay = 2 WHERE reserveCode = '$rcode'";
mysqli_query($conn, $updt_transaction);

$get = "SELECT * FROM reservation WHERE reservationCode = '$rcode'";			
$result = mysqli_query ($conn, $get);
$rowget = mysqli_fetch_assoc($result);
$total = $rowget['total'];
$balance = $rowget['balance'];

$newbal = $total - $balance;

$upd_reservation = "UPDATE reservation SET balance = $newbal ,paymentstatus = 2 WHERE reservationcode = '$rcode'";
$updres = mysqli_query($conn, $upd_reservation);

header('location: index2.php');

?>