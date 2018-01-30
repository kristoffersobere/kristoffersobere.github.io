<?php  

	require '../../db/connection.php';

$index = $_POST['index'];


	if (isset($_POST['edit'])) {

    $sel = "SELECT * FROM users WHERE id = $index";
    $res = mysqli_query($conn,$sel);
    $row = mysqli_fetch_array($res);
    extract($row);



		echo '<div class="container">
  <form class="form-horizontal" action="edit_users_endpoint.php?index='.$index.'" method="POST">

    <div class="form-group">
      <label class="control-label col-sm-2" >FirstName:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control"  placeholder="Fristname" name="fname" value="'.$firstname.'">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">LastName:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control"  placeholder="Fristname" name="lname" value="'.$lastname.'">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Email:</label>
      <div class="col-sm-3">
        <input type="email" class="form-control"  placeholder="Enter email" name="email" value="'.$email.'">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Address:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control"  placeholder="address" name="address" value="'.$address.'">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Number:</label>
      <div class="col-sm-3">
        <input type="number" class="form-control"  placeholder="number" name="number" value="'.$number.'">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Username:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control"  placeholder="username" name="username" value="'.$username.'">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Password:</label>
      <div class="col-sm-3">          
        <input type="password" class="form-control"  placeholder="Enter password" id="pwd" name="pwd" value="'.$password.'">
      </div>
    </div>

<span id="pwd_error" class="col-sm-offset-2"></span>
    <div class="form-group">
      <label class="control-label col-sm-2">Confirm Password:</label>
      <div class="col-sm-3">          
        <input type="password" class="form-control"  placeholder="Enter password" id="cpwd" name="cpwd" value="'.$password.'">
      </div>
    </div>';

      // if ($user_type == 2) {
      //  echo '<div class="form-group">
      //           <label class="col-sm-offset-2">Type:</label>
      //           <div class="radio col-sm-offset-2">
      //           <label><input type="radio" name="optradio" value="1">Admin</label>
      //         </div>
      //         <div class="radio col-sm-offset-2">
      //           <label><input type="radio" name="optradio" value="2" checked>User</label>
      //         </div>
      //       </div>';
      // }elseif ($user_type == 1) {
      //   echo '<div class="form-group">
      //         <label class="col-sm-offset-2">Type:</label>
      //         <div class="radio col-sm-offset-2">
      //         <label><input type="radio" name="optradio" value="1" checked>Admin</label>
      //       </div>
      //       <div class="radio col-sm-offset-2">
      //         <label><input type="radio" name="optradio" value="2" >User</label>
      //       </div>
      //     </div>';
      // }

    

   echo ' <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-3">
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>';
	}


?>
<!-- <script type="text/javascript">
	$('#cpwd').on('input', function(){
			//console.log('asdasd')
			 ppw = $('#pwd').val();
			 ccpw = $('#cpwd').val();

			if(ppw !=  ccpw){
				$('#btn_user_submit').attr('disabled',true)
				$('#pwd_error').css('color','red')
				$('#pwd_error').html('passwords do not match')
			} else {
				$('#btn_user_submit').removeAttr('disabled')
				$('#pwd_error').css('color','green')
				$('#pwd_error').html('passwords matched')
			}
		});
</script> -->