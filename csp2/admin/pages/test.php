<?php  
require '../../db/connection.php';

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



?>

<script type="text/javascript">
    
    $('.edit_user1').click(function(){
            var index = $(this).data('index');
            $.ajax({
            method: 'post',
            url: 'edit_users.php',
            data: {
                edit : true,
                index : index
            },
            success: function(data){
                $("#modal-body-users").html(data);
                $("#add").modal('show');
            }
        });
    });
</script>