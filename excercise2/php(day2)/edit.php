<?php 
function display_title() {
	echo "Edit page";
}



function display_content() {
	$index = 
	$string = file_get_contents("assets/items.json");
	$items = json_decode($string, true);

	echo "<div class='col-xs-4 item_display'><img src='".$items['img']."'>";
		echo "<h5>".$items[$index]."</h5>";
		echo "Price: &#8369;".$items[$index]."<br>";

		echo "</div>";
	
	echo "</div>";	



	
}

require 'template.php';

?>