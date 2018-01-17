<?php 
$username = $_POST['username'];
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
header('location: register.php');
?>

