<?php  
	$index = $_POST['index'];
/*	$string = file_get_contents("assets/items.json");
	$items = json_decode($string, true);*/
	require 'db/connection.php';

	$sql = "SELECT * FROM rooms WHERE id = '$index'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	extract($row);

	/*$img = $items[$index]['img'];
	$name = $items[$index]['name'];
	$description = $items[$index]['description'];
	$price = $items[$index]['price'];*/

		echo '<div class="row">';

		echo "<div class='col-xs-10 text-center item_display'><form action='delete.php?index=$index' method='post'><img src='$image'><br>";
		echo "Name: $name<br>";
		echo "Price: &#8369; $price<br>";
		echo "<input type='submit' class='btn btn-success' value='Yes'>";
		echo "<input type='button' class='btn btn-danger' data-dismiss='modal' value='No'>";
		

		echo "</form></div></div>";
?>