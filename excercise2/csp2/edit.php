<?php 

	$index = $_GET['index'];
	require 'db/connection.php';
	/*$string = file_get_contents("assets/items.json");
	$items = json_decode($string, true);*/

	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$description = mysqli_real_escape_string($conn,$_POST['description']);
	$price = mysqli_real_escape_string($conn,$_POST['price']);

	/*$items[$index]['name'] = htmlspecialchars($_POST['name']);
	$items[$index]['description'] = htmlspecialchars($_POST['description']);
	$items[$index]['price'] = htmlspecialchars($_POST['price']);*/

	$sql = "UPDATE rooms SET
			name ='$name',
			description = '$description',
			price = '$price'
			WHERE id ='$index'";

	mysqli_query($conn,$sql) or die(mysqli_error($conn));

	/*$file = fopen('assets/items.json', 'w');
	fwrite($file,json_encode($items, JSON_PRETTY_PRINT));
	fclose($file);*/

	header('location: menu.php');

		/*echo '<div class="row">';

		echo "<div class='col-xs-4 item_display'><form><img src='$img'><br>";
		echo "Name: <input type= 'text' name='name' value='$name'><br>";
		echo "Description: <textarea name='description'>$description</textarea><br>";
		echo "Prince: &#8369; <input type='number' name='price' min=0 value='$price'><br>";
		echo "<a href='menu.php'><input type='button' class='btn btn-danger' value='Cancel'></a>";
		echo "<input type='submit' class='btn btn-success' value='save'>";


		echo "</form></div></div>";*/
	




	


?>