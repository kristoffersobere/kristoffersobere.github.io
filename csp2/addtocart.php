<?php 
require 'db/connection.php';
session_start();
$index = $_GET['index'];
$qty = $_POST['qty'];
$datein = $_GET['checkin'];
$dateout = $_GET['checkout'];

$sel_fac = "SELECT * FROM rooms WHERE id=$index";
$selfac_que = mysqli_query($conn, $sel_fac);
$row_fac = mysqli_fetch_array($selfac_que);
$rID = $row_fac['id'];
// $price = $row_fac['Price']; 
$quantity = $row_fac['qty']; 
// $total = $price * $qty;


/*$_SESSION['cart'] = [            ////= > same as $_SESSION['cart'][$index]
	$index => $qty
];*/

if (isset($_SESSION['cart'][$index])) {
	$_SESSION['cart'][$index] += $qty;

}else{
	$_SESSION['cart'][$index] = $qty;
}

		// $sel = "SELECT * FROM availability WHERE room_id = $rID AND checkin='$datein' AND checkout='$dateout'";
		// $sel_que = mysqli_query($conn, $sel);
		// $count = mysqli_num_rows($sel_que);
		// $tot_quan = 0;
		// if ($count > 0) {
		// 	//echo 'meron';
		// 	while ($row = mysqli_fetch_array($sel_que)) {
		// 		$avail_quan = $row['qty'];
		// 	}

		// 	$tot_quan = $avail_quan - $qty;
		// 	$update = "UPDATE availability SET qty=$tot_quan WHERE id = $index AND checkin='$datein' AND checkout='$dateout'";
		// 	$upd_que = mysqli_query($conn, $update);

		// 	if ($upd_que) {
		// 		if (isset($_SESSION['cart'][$index])) {
		// 			$_SESSION['cart'][$index] += $qty;

		// 		}else{
		// 			$_SESSION['cart'][$index] = $qty;
		// 		}
		
		// 		echo '<script language="javascript">';
		// 		echo 'window.location.href="menu2.php?checkin='.$datein.'&checkout='.$dateout.'"';
		// 		echo '</script>';

		// 	}
		// }
		// else{
		// 	// echo "wla";
		// 	$quan_a = $quantity - $qty;
		// 	$insert_a = "INSERT INTO availability(room_id, checkin, checkout, qty)
		// 		VALUES($rID, '$datein', '$dateout',$quan_a)";
		// 	$inserta_que = mysqli_query($conn, $insert_a);
		// 	if ($inserta_que) {
		// 		if (isset($_SESSION['cart'][$index])) {
		// 			$_SESSION['cart'][$index] += $qty;

		// 		}else{
		// 			$_SESSION['cart'][$index] = $qty;
		// 		}
		// 		echo '<script language="javascript">';
		// 		echo 'window.location.href="menu2.php?checkin='.$datein.'&checkout='.$dateout.'"';
		// 		echo '</script>';
		// 	}
		// }




//print_r($_SESSION['cart']);

//header('location: menu2.php?checkin2=$checkin&checkout2=$checkout');
echo '<script language="javascript">';
echo 'window.location.href="menu2.php?checkin='.$datein.'&checkout='.$dateout.'"';
echo '</script>';

?>