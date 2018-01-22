<?php 
require 'db/connection.php';
session_start();

/*$string = file_get_contents("assets/users.json");
$users = json_decode($string, true);*/
$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
$result = mysqli_query($conn,$sql);

			//if (isset($_POST['submit'])) {				
					 if(mysqli_num_rows($result)>0) {	
					 	$row = mysqli_fetch_assoc($result);
			         	$_SESSION['username'] = $username;
			         	$_SESSION['user_type'] = $row['user_type'];
			      		header('location:menu.php');
				      }else {
				         $error = "Your Login Name or Password is invalid";
				      }


?>