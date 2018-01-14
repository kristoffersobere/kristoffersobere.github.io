<?php 
//require 'users.php';
session_start();

$string = file_get_contents("assets/users.json");
$users = json_decode($string, true);

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($users[$username]) && $users[$username] == $password) {
	$_SESSION['username'] = $username;
	header('location: menu.php');
} else {
	echo "failed to login. incorrect login credentials.";
	echo "please again login <a href='homepage.php'>here</a>";
}


?>