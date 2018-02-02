<?php 

require 'db/connection.php';
$index = htmlspecialchars($_GET['index']);

/*$items = file_get_contents('assets/items.json');
$items = json_decode($items, true);
*/

/*unset($items[$index]);

$file = fopen('assets/items.json', 'w');
fwrite($file, json_encode($items, JSON_PRETTY_PRINT));
fclose($file);*/

$sql = "DELETE FROM rooms WHERE id ='$index'";
mysqli_query($conn,$sql) or die(mysqli_query($conn));


header('location: menu.php')	

 ?>