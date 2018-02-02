<?php 
function displayTitle(){
	echo 'Settings';
	
}

function displayContent() {
	require 'db/connection.php';
	date_default_timezone_set('ASIA/MANILA');
$user_id = $_SESSION['id'];

  $sel = "SELECT * FROM users WHERE id = $user_id";
  $res = mysqli_query($conn, $sel);
  $row = mysqli_fetch_assoc($res);

	

	echo ' <div class="well col-lg-12">

  <h2 class="text-center"> UserInfo </h2>

      <div class = "well">
<form class="form-horizontal" method="POST" action="updateuserinfo.php?id='.$user_id.'">
    <div class="form-group">
      <label class="control-label col-sm-2" for="firstame">First Name:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" value = "'.$row['firstname'].'">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="lastname">Last Name:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" value = "'.$row['lastname'].'">
      </div>
    </div>
   
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value = "'.$row['email'].'">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="address">Address:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address " value = "'.$row['email'].'">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="number">Mobile Number:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="number" name="number" placeholder="Enter number" value = "'.$row['number'].'">
      </div>
    </div>

    <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-primary" name="update" value="Update">
      </div>
    </div>
  </form>

  </div>

  
  

      </div>
';

}//fucntiodisply

require 'template.php';

 ?>