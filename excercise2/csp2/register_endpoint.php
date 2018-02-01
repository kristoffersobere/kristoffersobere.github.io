<?php
require 'db/connection.php';
session_start();
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$address = $_POST['address'];
	$username = $_POST['username'];
	$password = sha1($_POST['pw']);
	$set = 63;
	$setnumber = substr($number,1);
	$numbers =  $set . $setnumber; 

$sql = "INSERT INTO users (firstname,lastname,email,number,address,username,password,user_type,status) VALUES ('$fname','$lname','$email',$numbers,'$address',
'$username','$password',2,1)";
mysqli_query($conn,$sql) or die(mysqli_error($conn));

$_SESSION['username']= $username;
$_SESSION['id'];
$_SESSION['firstname'];
$_SESSION['lastname'];
$_SESSION['user_type'];
//header('location: homepage.php');
?>

