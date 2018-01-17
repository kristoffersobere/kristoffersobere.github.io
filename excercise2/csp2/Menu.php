<?php 
//require_once 'items.php'; //replaced



$string = file_get_contents("assets/items.json");
$items = json_decode($string, true);

function displayTitle(){
	echo 'Menu<br>';
	
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

		$img = $item['img'];
		$name = $item['name'];
		$description = $item['description'];
		$price = $item['price'];

		if ($filter == 'All' || $item['category'] == $filter) {
		
		echo "<div class='col-xs-4 item_display'><img src='".$item['img']."'>";
		echo "<h5>".$item['name']."</h5>";
		echo "Price: &#8369;".$item['price']."<br>";

		if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {

			$username = $_SESSION['username'];

			echo "<button class='btn btn-primary render_modal_body'  data-toggle='modal' data-target='#myModal' data-index='$index' >Edit</button>";

			echo "<button class='btn btn-danger render_modal_body_delete'  data-toggle='modal' data-target='#myModaldelete' data-index='$index' >Delete</button>";

		}elseif (isset($_SESSION['username'])) {

			echo "<form action='addtocart.php?index=$index'method='POST'>
			<input type='number' name='qty' placeholder='Quantity' value='0'><br>";
			echo " <button class='btn btn-warning'>Add To Cart</button></form>";

		}

		echo "</div>";

		
		}
	}
	echo "</div>";	

	echo '<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Modal Header</h4>
			      </div>
			      <div class="modal-body" id="modal-body">
			        <div class="row">

	

			     </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
			</div>
			
			<!-- Modal2 -->
			<div id="myModaldelete" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Modal Header</h4>
			      </div>
			      <div class="modal-body" id="modal-body-delete">
			        <div class="row">

	

			     </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
			</div>';

}



require 'template.php';

 ?>

