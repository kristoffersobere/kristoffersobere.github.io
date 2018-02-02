<?php  
session_start();
$index=htmlspecialchars($_GET['index']);
$datein=htmlspecialchars($_GET['checkin']);
$dateout=htmlspecialchars($_GET['checkout']);

$index;
$checkin;
$checkout;

unset($_SESSION['cart'][$index]);
echo '<script language="javascript">';
echo 'window.location.href="menu2.php?checkin='.$datein.'&checkout='.$dateout.'"';
echo '</script>';
?>