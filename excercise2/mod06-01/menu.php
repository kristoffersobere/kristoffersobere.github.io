<?php
// require_once "items.php"; //replace with code to get items from the json file

$string = file_get_contents("assets/items.json");
$items = json_decode($string, true);

function display_title(){
	echo "Menu Page";
}

function display_content(){
	global $items;
	$categories = array_unique(array_column($items, 'category'));
	
	// $filter = 'All';
	// if(isset($_GET['category']))
	// 	$filter = $_GET['category'];
	$filter = isset($_GET['category']) ? $_GET['category'] : 'All';

	echo "<form><select name='category'><option>All</option>";
	foreach ($categories as $category) {
		// if($filter == $category)
		// 	echo "<option selected>$category</option>";
		// else
		// 	echo "<option>$category</option>";
		echo $filter == $category ? "<option selected>$category</option>" : "<option>$category</option>";
	}
	echo "</select>";
	echo "<button>Search</button></form>";

	echo "<div class='row'>";
	foreach ($items as $index => $item) {
		if($filter == 'All' || $item['category'] == $filter){
			echo "<div class='col-xs-4 item_display'><img src='".$item['img']."'>";
			echo "<h5>".$item['name']."</h5>";
			echo "Price: Php".$item['price']."<br>";
			if(isset($_SESSION['username']) && $_SESSION['username'] == 'admin')
				echo "<a href='edit.php?index=$index'><button class='btn btn-primary'>Edit / Delete</button></a>";
			else if(isset($_SESSION['username']))
				echo "<button class='btn btn-success'>Add to Cart</button>";
			echo "</div>";
		}
	}
	echo "</div>";	
}

require "template.php";

?>
