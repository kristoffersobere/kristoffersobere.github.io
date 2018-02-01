<?php  
function displayadTitle() {
echo "Rooms";
}

function displayadContent() {
require '../../db/connection.php';
echo "<button class='btn btn-success' id='add_item'>Add Rooms</button>";

		$filter = isset($_GET['category'])? $_GET['category']: 'All';
    
    echo "<form ><select name ='category'><option>All</option>";
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $id=$row['id'];
        $category = $row['name'];
        echo $filter == $id ? "<option selected value='$id'>$category</option> ":"<option value='$id'>$category</option>";
    }
        echo "</select><button>Search</button></form>";


        $sql = "SELECT * FROM rooms";
        $result = mysqli_query($conn,$sql);

        echo "<div class='row'>";
        while ($item = mysqli_fetch_assoc($result)) {
            $index = $item['id'];
        
            if($filter == 'All'|| $item['category_id'] == $filter){
            echo "<div class= 'well col-xs-4 item_display'><img src='../../".$item['image']."'>";
            echo "<h3>".$item['name']."</h3>";
            echo "<h4>Available: ".$item['qty']."</h4>";
            echo "Price: &#8369;".$item['price']."<br>";

                if (isset($_SESSION['username']) && $_SESSION['user_type'] == 1) {

                    $username = $_SESSION['username'];

                    echo "<button class='btn btn-primary render_modal_body' data-toggle='modal' data-target='#myModal' data-index='$index'>Edit</button>";

                    echo "<button class='btn btn-danger render_modal_body_delete'  data-toggle='modal' data-target='#myModaldelete' data-index='$index' >Delete</button>";

                }elseif (isset($_SESSION['username'])) {

                    echo "<form action='addtocart.php?index=$index'method='POST'>
                    <input type='number' name='qty' placeholder='Quantity' required><br>";
                    echo " <button class='btn btn-warning'>Add To Cart</button></form>";

                }

            echo "</div>";

            }/*endif*/
    }/*end while*/
									
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


}//endfunction

require 'templatead.php';

?>     