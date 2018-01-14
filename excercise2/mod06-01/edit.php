<?php

	function display_title(){
		echo "Edit / Delete Page";
	}

	function display_content(){
		$index = $_GET['index'];
		$string = file_get_contents("assets/items.json");
		$items = json_decode($string, true);

		echo "<div class='row'>";
		echo "<div class='col-xs-4 item_display'><img src='".$items[$index]['img']."'>";
		echo "<h5>".$items[$index]['name']."</h5>";
		echo "Price: Php".$items[$index]['price']."<br>";
		echo "<button class='btn btn-danger'>Delete</button>";
		echo "</div></div>";	
	}

	require "template.php";
?>