<?php 
session_start();
$index = $_GET['index'];
$qty = $_POST['qty'];

/*$_SESSION['cart'] = [            ////= > same as $_SESSION['cart'][$index]
	$index => $qty
];*/

if (isset($_SESSION['cart'][$index])) {
	$_SESSION['cart'][$index] += $qty;

}else{
	$_SESSION['cart'][$index] = $qty;
}
//print_r($_SESSION['cart']);

header('location: menu.php');



?>