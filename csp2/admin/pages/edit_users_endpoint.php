<?php  
require '../../db/connection.php';
$index = $_GET['index'];

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$address = $_POST['address'];
$number = $_POST['number'];

// $username = $_POST['username'];
// $password = sha1($_POST['pwd']);


// $upt = "UPDATE users SET firstname = '$fname'	
// WHERE id = '$index'";
// $res2 = mysqli_query($conn,$upt);
//header('location: users.php');


$upt = "UPDATE users SET firstname = '$fname', lastname = '$lname', email = '$email', address = '$address', number = '$number'
WHERE id = '$index'";
$res2 = mysqli_query($conn,$upt);
header('location: users.php');
?>