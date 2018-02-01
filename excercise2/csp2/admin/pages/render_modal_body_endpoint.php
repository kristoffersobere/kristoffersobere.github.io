<?php  

	
	/*$string = file_get_contents("assets/items.json");
	$items = json_decode($string, true);*/

	require '../../db/connection.php';

	if (isset($_POST['add'])) {

		echo "<div class='row'>";
		echo "<div class='item_display'><form action='add_item.php' method='post' enctype='multipart/form-data'>";
		echo "Name: <input type='text' name='name'><br>";
		echo "Description: <textarea name='description'></textarea><br>";
		echo "Image: <input type='file' name='image'>";
		echo "Pax <input type='number' name='pax' min=0 ><br>";
		echo "QTY <input type='number' name='qty' min=0 ><br>";
		echo "Price: &#8369; <input type='number' name='price' min=0 ><br>";
		echo "<select name='category'><option>Select Category</option>";
		$sql = "SELECT * FROM categories";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result)){
			extract($row);
			echo "<option value='$id'>$name</option>";
		}
		echo "</select>";
		echo "<input type='button' class='btn btn-danger' data-dismiss='modal' value='Cancel'>";
		echo "<input type='submit' name='submit' class='btn btn-success' value='Add Item'>";
		echo "</form></div></div>";
	}

	if(isset($_POST['edit'])){

		$index = $_POST['index'];
		$sql = "SELECT * FROM rooms  WHERE id='$index'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		extract($row);


		echo '<div class="row">';

		echo "<div class=' col-xs-10  item_display'><form action='edit.php?index=$index' method='post'><img src='../../$image'><br>";
		echo "Name:<br> <input type= 'text' name='name' value='$name'><br>";
		echo "Description:<br> <textarea name='description' style='width: 200px;'>$description</textarea><br>";
		echo "Price: &#8369; <input type='number' name='price' min=0 value='$price'><br>";
		echo "<select name='category'>";
		$sql = "SELECT * FROM categories";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result)){
			extract($row);
			if($category_id == $id)
				echo "<option value='$id' selected>$name</option>";
			else
				echo "<option value='$id'>$name</option>";
		}
		echo "</select><br>";
		echo "<input type='button' class='btn btn-danger' data-dismiss='modal' value='Cancel'>";
		echo "<input type='submit' class='btn btn-success' value='save'>";
		

		echo "</form></div></div>";
		}
?>