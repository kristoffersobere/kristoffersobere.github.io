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
		$qty = $row['qty'];
		$price = $row['price'];
		$subtotal = $price*$q;
		$total += $subtotal;
		



		
		echo "<div class='col-xs-6 item_display'><form action='cart_qty_change.php?index=$index' method='POST'><img src='$img'><br>";
		echo "Name: ".$name. "<br>";
		echo "qty: ".$qty. "<br>";
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

<!-- Modal -->
			<div id="myModalCart" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Modal Header</h4>
			      </div>
			      <div class="modal-body" id="modal-body">
			        <div class="rw">
			        	 <div class='col-xs-6 item_display'><form action='cart_qty_change.php?index=$index' method='POST'><img src='$img'><br>
						 Name: ".$name. "<br>
						 qty: ".$qty. "<br>
						 Price: &#8369;".$subtotal. "<br>	
						 <input type='number' name='qty' value=$q>
						 <br><input class='btn btn-primary' type='submit' name='' value='Change Quantity'>
						 <br><a href='cart_remove.php?index=$index'><input class='btn btn-warning' type='button' name='' value='Remove from Cart'></a><br>
						 </form></div>
	

			     </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
			</div>


<br>

<div class="container">
  <button type="button" class="btn btn-info col-xs-12" data-toggle="collapse" data-target="#demo">Shopping Cart</button>
  <div id="demo" class="collapse" >
    <?php 
    $qtty = $_SESSION['cart'];//session array
	
if (isset($qtty)) {
	require 'db/connection.php';
	date_default_timezone_set('ASIA/MANILA'); 
	$date_now = date("Y-m-d");
	$date_max = date('Y-m-d', PHP_INT_MAX);	
	$datein = $_GET['checkin'];
	$dateout = $_GET['checkout'];

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
		$qty = $row['qty'];
		$price = $row['price'];
		$subtotal = $price*$q;
		$total += $subtotal;
		



		
		  echo "<div class='col-xs-12 item_display'><form action='cart_qty_change.php?index=$index&checkin=$datein&checkout=$dateout' method='POST'><img src='$img'><br>";
                            echo "Name: ".$name. "<br>";
                            echo "qty: ".$qty. "<br>";
                            echo "Price: &#8369;".$price. "<br>";  
                            echo "<input type='number' name='qty' class='quant' id='$index' value='$q' >";
                            //echo "<button onClick='send(".$index.")' type='button'>qty</button>";
                            echo '<br><input class="btn btn-primary " type="submit" value="Change Quantity" >';
                            echo "<br><a href='cart_remove.php?index=$index'><input class='btn btn-warning' type='button' name='' value='Remove from Cart'></a><br>";
                            echo "</form></div>";
		
		
		
		
		}
		
	} echo '<center><h2>Total Price: &#8369;'.$total.'</h2></center>';



    ?>

  </div>
  </div>
  <hr>