<?php 

function displayTitle(){
	echo 'Shopping Cart';
}

function displayContent() {
	$qtty = $_SESSION['cart'];//session array
	
if (isset($qtty)) {
	require 'db/connection.php';

					//new keys
	$total = 0;
	foreach ($qtty as $index => $q) {
/*		$string = file_get_contents("assets/items.json");
		$items = json_decode($string, true);
*/

		$sql = "SELECT * FROM rooms WHERE id = $index";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);

		$img = $row['image'];
		$name = $row['name'];
		$description = $row['description'];
		$price = $row['price'];
		$subtotal = $price*$q;
		$total += $subtotal;
		



		
		echo "<div class='col-xs-6 item_display'><form action='cart_qty_change.php?index=$index' method='POST'><img src='$img'><br>";
		echo "Name: ".$name. "<br>";
		echo "Price: &#8369;".$subtotal. "<br>";	
		echo "<input type='number' name='qty' value=$q>";
		echo "<br><input class='btn btn-primary' type='submit' name='' value='Change Quantity'>";
		echo "<br><a href='cart_remove.php?index=$index'><input class='btn btn-warning' type='button' name='' value='Remove from Cart'></a><br>";
		echo "</form></div>";
		
		
		
		
		}
		
	} echo '<center><h2>Total Price: &#8369;'.$total.'</h2></center>';

}


require 'template.php';
?>

