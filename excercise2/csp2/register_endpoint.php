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

$sql = "INSERT INTO users (firstname,lastname,email,number,address,username,password,user_type,status) VALUES ('$fname','$lname','$email','$number','$address',
'$username','$password',2,1)";
mysqli_query($conn,$sql) or die(mysqli_error($conn));

$_SESSION['username'] = $username;
$_SESSION['user_type'] = 2;
header('location: Homepage.php');
/*$username = $_POST['username'];
$password = $_POST['pw'];

$string = file_get_contents("assets/users.json");
$users = json_decode($string, true);
echo "original users array"; print_r($users);

$users[$username] = $password;
echo "<br> new users array"; print_r($users);

$file = fopen("assets/users.json", "w");
fwrite($file, json_encode($users,JSON_PRETTY_PRINT));
fclose($file);

echo "<script type='text/javascript'>alert('success')</script>";
header('location: register.php');*/
?>

