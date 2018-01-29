<?php 
require 'db/connection.php';
session_start();

/*$string = file_get_contents("assets/users.json");
$users = json_decode($string, true);*/
if(isset($_POST['submit'])){
$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
$result = mysqli_query($conn,$sql);

			//if (isset($_POST['submit'])) {				
					 if(mysqli_num_rows($result)>0) {	
					 	$row = mysqli_fetch_assoc($result);
			         	$_SESSION['username'] = $row['username'];
			         	$_SESSION['id'] = $row['id'];
			         	$_SESSION['firstname'] = $row['firstname'];
			         	$_SESSION['lastname']= $row['lastname'];
			         	$_SESSION['user_type'] = $row['user_type'];
			      		header('location:homepage.php');
				      }else {
				         $error = "Your Login Name or Password is invalid";
				      }
}

if (isset($_POST['register'])) {

	$user = $_POST['username'];
	$sql = "SELECT * FROM users WHERE username = '$user'";
	$results = mysqli_query($conn,$sql);

	if(mysqli_num_rows($results)>0){
		echo "invalid";
	}else {
		echo "valid";
	}
}

?>