<?php  
function displayadTitle() {
echo "USERS";
}

function displayadContent() {
require '../../db/connection.php';

		?>
		<?php
									

		echo '
	<div class="panel panel-default">
                        <div class="panel-heading">
                          <button class="btn btn-lg" id="add_user">Add User</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Number</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                        
                                    </tr>
                                </thead><tbody id="tbodyusers">

                                <div class="loader"></div>
                                ';


                          $sel = "SELECT * FROM users ORDER BY user_type";
									$res = mysqli_query($conn,$sel);
									while ($row_users = mysqli_fetch_array($res)) {
										$index = $row_users['id'];
										$fname = $row_users['firstname'];
										$lname = $row_users['lastname'];
										$email = $row_users['email'];
										$address = $row_users['address'];
										$number = $row_users['number'];
										$type = $row_users['user_type'];
										$status = $row_users['status'];
										
                                   
                                echo '  <tr>
                                        <td>'.$fname.'</td>
                                        <td>'.$lname.'</td>
                                        <td>'.$email.'</td>
                                        <td>'.$address.'</td>
                                        <td>'.$number.'</td>';
                                        if ($type == 1 || $type == 3) {
                                        	echo "<td>Admin</td>";
                                        }else if($type == 2){
                                        	echo "<td>Customer</td>";
                                        }
                                        if ($status == 1) {
                                        	echo "<td><a href='status_users.php?index=$index'><button class='btn btn-warning'>disable</button></a></td>";
                                        }else {
                                        	echo "<td><a href='status_users.php?index=$index'><button class='btn btn-primary'>enable</button></a></td>";
                                        }
                                    
                                        if ($status == 0 && $type == 2) {
                                        echo "<td><button class='btn btn-default edit_user1'  data-index='$index'>Edit</button></td>";
                                     
                                        } elseif ($status == 1 && $type == 2) {
                                        echo "<td><button class='btn btn-default edit_user1'  data-index='$index'>Edit</button></td>";
                                        
                                        }elseif ($status == 0 && $type == 3 || $type == 1) {
                                        echo "<td><button class='btn btn-default edit_user1'  data-index='$index'>Edit</button></td>";
                                   
                                        }elseif ($status == 1 && $type == 3 || $type == 1) {
                                        echo "<td><button class='btn btn-default edit_user1'  data-index='$index'>Edit</button></td>";
                                   
                                        }
                                 echo ' </tr>';
                                     
                                   }//endwhile
                                    
                               
                        echo   '        
                               	</tbody>
                            </table>
                            <!-- /.table-responsive -->
                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                                	';
                                	


}//endfunction

require 'templatead.php';

?>     
   
<!-- Modal -->
<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add User</h4>
      </div>
      <div id="modal-body-users">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>