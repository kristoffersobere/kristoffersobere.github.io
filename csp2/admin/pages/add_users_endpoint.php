<?php

require '../../db/connection.php';

	


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$address = $_POST['address'];
$number = $_POST['number'];
$type = $_POST['optradio'];
$username = $_POST['username'];
$password = sha1($_POST['pwd']);

$sql = "INSERT INTO users (firstname, lastname, email, address, number,username,password,user_type,status) VALUES 
	('$fname','$lname','$email','$address' ,'$number',
'$username','$password','$type',1)";
mysqli_query($conn,$sql) or die(mysqli_error($conn));

header('location: users.php');


?>