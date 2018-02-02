<?php
require 'db/connection.php';
session_start();
	$fname = htmlspecialchars($_POST['firstname']);
	$lname = htmlspecialchars($_POST['lastname']);
	$email = htmlspecialchars($_POST['email']);
	$number = htmlspecialchars($_POST['number']);
	$address = htmlspecialchars($_POST['address']);
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars(sha1($_POST['pw']));
	$set = 63;
	$setnumber = substr($number,1);
	$numbers =  $set . $setnumber; 

$sql = "INSERT INTO users (firstname,lastname,email,number,address,username,password,user_type,status) VALUES ('$fname','$lname','$email',$numbers,'$address',
'$username','$password',2,1)";
mysqli_query($conn,$sql) or die(mysqli_error($conn));



// $_SESSION['username']= $username;
// $_SESSION['id'];
// $_SESSION['firstname'];
// $_SESSION['lastname'];
// $_SESSION['user_type'];
header('location: homepage.php');
?>

