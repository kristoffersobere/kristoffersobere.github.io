<?php 
//require_once 'items.php'; //replaced



$string = file_get_contents("assets/items.json");
$items = json_decode($string, true);

function displayTitle(){
	echo 'Menu';
}

function displayContent() {
	
global $items;
	$categories = array_unique(array_column($items,'category'));
	
	$filter = "All";
	if (isset($_GET['category'])) 
	$filter = $_GET['category'];

		echo "<div class='row'><form><select name='category'><option>All</option>";

	foreach ($categories as $category) {
		echo $filter == $category ? "<option selected>$category</option>" : "<option>$category</option>";

		
	
	



	}
	echo "</select><button>Sort By Category</button></form></div>";

	echo "<div class='row'>";

	foreach ($items as $index => $item) {
		if ($filter == 'All' || $item['category'] == $filter) {
		
		echo "<div class='col-xs-4 item_display'><img src='".$item['img']."'>";
		echo "<h5>".$item['name']."</h5>";
		echo "Price: &#8369;".$item['price']."<br>";

		if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {

			$username = $_SESSION['username'];

			echo "<a href='edit.php?index=$index'> <button class='btn btn-primary'>Edit</button>
			</a>";

		}elseif (isset($_SESSION['username'])) {

			echo " <button class='btn btn-warning'>Add To Cart</button>";

		}

		echo "</div>";
		}
	}
	echo "</div>";	
}



require 'template.php'

 ?>

