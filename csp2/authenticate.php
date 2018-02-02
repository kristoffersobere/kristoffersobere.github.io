<?php 
require 'db/connection.php';
session_start();

/*$string = file_get_contents("assets/users.json");
$users = json_decode($string, true);*/
if(isset($_POST['submit'])){
$username = $_POST['username'];
$password = sha1($_POST['password']);
//$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn,$sql);

					 if(mysqli_num_rows($result)>0) {	
					 	$row = mysqli_fetch_assoc($result);

					 	if ($row['status'] == 1 && $row['user_type'] == 2) {
					 		$_SESSION['username'] = $row['username'];
				         	$_SESSION['id'] = $row['id'];
				         	$_SESSION['firstname'] = $row['firstname'];
				         	$_SESSION['lastname']= $row['lastname'];
				         	$_SESSION['user_type'] = $row['user_type'];
				         	header('location:homepage.php');
					 	} elseif ($row['user_type'] == 1 &&  $row['status'] == 1) {
					 		$_SESSION['username'] = $row['username'];
				         	$_SESSION['id'] = $row['id'];
				         	$_SESSION['firstname'] = $row['firstname'];
				         	$_SESSION['lastname']= $row['lastname'];
				         	$_SESSION['user_type'] = $row['user_type'];
				         	header('location:admin/pages/index.php');
					 		} else {
					 			echo "your account is not active";
					 		}

					 	}//if rese
					 	else {

				         	echo "your account doesnt exist!";
				      }//else res
}//

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