<?php  
require '../../db/connection.php';
$index = $_GET['index'];

$sel = "SELECT status FROM users WHERE id = '$index'";
$res = mysqli_query($conn,$sel);
$row = mysqli_fetch_array($res);
$status = mysqli_escape_string($row['status']);

if ($status == 1) {
	$upt = "UPDATE users SET status = 0 WHERE id = $index";
	$res2 = mysqli_query($conn,$upt);
	header('location: users.php');
}else if ($status == 0) {
	$upt = "UPDATE users SET status = 1 WHERE id = $index";
	$res2 = mysqli_query($conn,$upt);
	header('location: users.php');
}




?>