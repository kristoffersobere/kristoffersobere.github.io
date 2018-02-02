<?php 
require '../../db/connection.php';
$id = $_GET['index'];
$query = "DELETE FROM rooms WHERE id = $id";
mysqli_query($conn,$query);
header('location: rooms.php');
?>