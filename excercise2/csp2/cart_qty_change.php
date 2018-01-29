<?php  
session_start();
require 'db/connection.php';

$index=$_GET['index'];
$qtyy = $_POST['qty'];
$datein = $_GET['checkin'];
$dateout = $_GET['checkout'];
// $datein = $_GET['checkin'];
// $dateout = $_GET['checkout'];

// echo $datein;

//$price = $_POST['price'];
/*$sql = "SELECT price FROM rooms WHERE id = '$index'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
extract($row);                       
*/
if (isset($_SESSION['cart'][$index])) {
	echo $_SESSION['cart'][$index] = $qtyy;


}
//header('location: menu2.php?');
echo '<script language="javascript">';
echo 'window.location.href="menu2.php?checkin='.$datein.'&checkout='.$dateout.'"';
echo '</script>';

?>