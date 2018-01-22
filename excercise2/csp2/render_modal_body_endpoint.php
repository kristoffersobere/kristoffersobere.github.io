<?php  
	$index = $_POST['index'];
	/*$string = file_get_contents("assets/items.json");
	$items = json_decode($string, true);*/
	require 'db/connection.php';

	$sql = "SELECT * FROM rooms WHERE id = '$index'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	extract($row);


		echo '<div class="row">';

		echo "<div class='col-xs-10 text-center item_display'><form action='edit.php?index=$index' method='post'><img src='$image'><br>";
		echo "Name: <input type= 'text' name='name' value='$name'><br>";
		echo "Description: <textarea name='description'>$description</textarea><br>";
		echo "Price: &#8369; <input type='number' name='price' min=0 value='$price'><br>";
		echo "<input type='button' class='btn btn-danger' data-dismiss='modal' value='Cancel'>";
		echo "<input type='submit' class='btn btn-success' value='save'>";
		

		echo "</form></div></div>";
?>