<?php 
function displayTitle(){
	echo 'Menu';
	
}

function displayContent() {
	require 'db/connection.php';
	date_default_timezone_set('ASIA/MANILA'); 
	$date_now = date("Y-m-d");
	$date_max = date('Y-m-d', PHP_INT_MAX);	
	$datein = $_GET['checkin'];
	$dateout = $_GET['checkout'];

	$sql = "SELECT  * FROM  rooms WHERE status = 0";
	$result = mysqli_query($conn,$sql);
	while ($row_fac = mysqli_fetch_array($result)) {
		
							$id = $row_fac['id'];
							$name = $row_fac['name'];
							$description = $row_fac['description'];
							$pax = $row_fac['pax'];
							$quan = $row_fac['qty'];
							$price = $row_fac['price'];
							$img = $row_fac['image'];
							$path ="upload/";

							$avail = "SELECT * FROM availability WHERE room_id = $id AND checkin ='$datein' AND checkout = '$dateout'";
							$avail_que = mysqli_query($conn, $avail);
							while ($row = mysqli_fetch_array($avail_que)) {
								$quan2 = $row['qty'];
							}
							$avail_count = mysqli_num_rows($avail_que);

							if ($avail_count > 0) {
								$avail_t = $quan2;

							}
							else{
								$avail_t = $quan;
							}


							echo "<div class='col-md-4'>";
								echo "<center>";
								echo "<form method='POST' action='addtocart.php?index=$id&checkin=$datein&checkout=$dateout'>";
									echo "<img src='".$img."' width='200px' height='200px'><br><br>";
									echo "<strong>Room Name: </strong>".$name."<br>";
									echo "<strong>Max number of people: </strong>".$pax."<br>";
									echo "<strong>Price: </strong>".number_format($price,2)."<br>";
									echo "<strong>Available: </strong>".$avail_t."<br>";
									echo "<strong>Quantity: </strong><br>";
									echo "<input type='number' name='qty' min='1' max='".$avail_t."' required><br>";
									echo "<button class='btn btn-success' name='add'>Add</button>";
								echo "</form>";
								echo "<center>";
							echo "</div>";

	}//while
	?>


	<?php

}//fucntiodisply

require 'template.php';

 ?>

 <!-- Modal cart-->
      <div id="modalcart" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="modal-title text-center">Cart <br><?php $datein = $_GET['checkin'];
               $dateout = $_GET['checkout']; echo "From: ".$datein." To: ".$dateout;  ?></h3>
            </div>
            <div class="modal-body-cart" id="modal-body-cart">
              <div class="container-fluid">
              <div class="row">

                <?php 
                 require 'db/connection.php';
				date_default_timezone_set('ASIA/MANILA'); 
				$date_now = date("Y-m-d");
				$date_max = date('Y-m-d', PHP_INT_MAX);	
				$datein = $_GET['checkin'];
				$dateout = $_GET['checkout'];

                  if (isset($_SESSION['cart'])) {
                    $qtty = $_SESSION['cart'];
                    
                    
                    $total = 0;
                    foreach ($qtty as $index => $q) {


                            $sql = "SELECT * FROM rooms WHERE id = $index";
                            $result = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($result);
                            $num_rows = mysqli_num_rows($result);



                            $img = $row['image'];
                            $name = $row['name'];
                            $description = $row['description'];
                            $qty = $row['qty'];
                            $price = $row['price'];
                            $subtotal = $price*$q;
                            $total += $subtotal;
                            

                            echo "<div class='col-xs-12 well item_display'><form action='cart_qty_change.php?index=$index&checkin=$datein&checkout=$dateout' method='POST'><img src='$img' class='img-rounded'><br>";
                            echo "Name: ".$name."<br>";
                            echo "Available: ".$qty."<br>";
                            echo "Price: &#8369;".$price. "<br>";  
                            echo "<input type='number' name='qty' class='quant' id='$index' min='1' max='".$qty."' value='$q' >";
                            //echo "<button onClick='send(".$index.")' type='button'>qty</button>";
                            echo '<br><input class="btn btn-primary " type="submit"  value="Change Quantity" >';
                            echo "<br><a href='cart_remove.php?index=$index'><input class='btn btn-warning' type='button' name='' value='Remove from Cart'></a><br>";
                            echo "</form></div>";
                                      
                            
                          }  
                          
                        }  
                        else
                        {

                          echo "no value";


                        }

                 ?>

  

           </div>
            <div class="modal-footer"><form action="processreservation.php?index=$index" method="POST">
              <?php  $datein = $_GET['checkin'];$dateout = $_GET['checkout']; 
              	if (isset($_SESSION['cart'])){
                echo '<center><h2>Total Price: &#8369;'.$total.'</h2></center>
                <input type="hidden" name="name" value = "'.$name.'">
                <input type="hidden" name="quan" value = "'.$qty.'">
                <input type="hidden" name="total" value = "'.$total.'">
                <input type="hidden" name="checkin" value = "'.$datein.'">
                <input type="hidden" name="checkout" value = "'.$dateout.'">
                <br><input class="btn btn-warning" type="submit"  value="Proceed"><br>';
                }?>

              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </form>
            </div>
          </div>
        </div><!-- divcontainer -->
        </div>
      </div>
      </div>

