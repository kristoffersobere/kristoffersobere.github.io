<?php  
session_start();
$index=$_GET['index'];
$qty = $_POST['qty'];

$_SESSION['cart'][$index] = $qty;

header('location: cart.php');

?>