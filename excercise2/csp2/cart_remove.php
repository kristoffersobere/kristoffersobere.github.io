<?php  
session_start();
$index=$_GET['index'];
$datein=$_GET['checkin'];
$dateout=$_GET['checkout'];

$index;
$checkin;
$checkout;

unset($_SESSION['cart'][$index]);
echo '<script language="javascript">';
echo 'window.location.href="menu2.php?checkin='.$datein.'&checkout='.$dateout.'"';
echo '</script>';
?>