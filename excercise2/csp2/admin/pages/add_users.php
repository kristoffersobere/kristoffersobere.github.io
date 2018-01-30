<?php  

	require '../../db/connection.php';

	if (isset($_POST['addusers'])) {
		echo '<div class="container">
  <form class="form-horizontal" action="add_users_endpoint.php" method="POST">

    <div class="form-group">
      <label class="control-label col-sm-2" >FirstName:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control"  placeholder="Fristname" name="fname">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">LastName:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control"  placeholder="Fristname" name="lname">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Email:</label>
      <div class="col-sm-3">
        <input type="email" class="form-control"  placeholder="Enter email" name="email">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Address:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control"  placeholder="address" name="address">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Number:</label>
      <div class="col-sm-3">
        <input type="number" class="form-control"  placeholder="number" name="number">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Username:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control"  placeholder="username" name="username">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Password:</label>
      <div class="col-sm-3">          
        <input type="password" class="form-control"  placeholder="Enter password" id="pwd" name="pwd">
      </div>
    </div>

<span id="pwd_error" class="col-sm-offset-2"></span>
    <div class="form-group">
      <label class="control-label col-sm-2">Confirm Password:</label>
      <div class="col-sm-3">          
        <input type="password" class="form-control"  placeholder="Enter password" id="cpwd" name="cpwd">
      </div>
    </div>

    <div class="form-group">
    	<label class="col-sm-offset-2">Type:</label>
	    <div class="radio col-sm-offset-2">
		  <label><input type="radio" name="optradio" value="1">Admin</label>
		</div>
		<div class="radio col-sm-offset-2">
		  <label><input type="radio" name="optradio" value="2" checked>User</label>
		</div>
	</div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-3">
        <button type="submit" id = "btn_user_submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>';
	}


?>
<script type="text/javascript">
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
</script>