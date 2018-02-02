<?php  
require 'db/connection.php';
$user_id  = $_GET['id'];

$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$email = htmlspecialchars($_POST['email']);
$address = htmlspecialchars($_POST['address']);
$number = htmlspecialchars($_POST['number']);

$update = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', email = '$email', address= '$address', number = $number WHERE id = $user_id ";
$res = mysqli_query($conn,$update);

header('location: accountsettings.php');

?>