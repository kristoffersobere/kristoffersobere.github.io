<?php 
function displayTitle(){
	echo 'Register';
}

function displayContent(){
	 echo '<div class = "well">
<form class="form-horizontal" method="POST" action="register_endpoint.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="firstame">First Name:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="lastname">Last Name:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name">
      </div>
    </div>
   
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="address">Address:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="number">Mobile Number:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="number" name="number" placeholder="Enter Address">
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="username">Userame:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
        <span id="username_error"></span>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pw">Password:</label>
      <div class="col-sm-8"> 
        <input type="password" class="form-control" id="pw" name="pw" placeholder="Enter password">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="cpw">Confirm Password:</label>
      <div class="col-sm-8"> 
        <input type="password" class="form-control" id="cpw" name="cpw" placeholder="Confirm password">
        <span id="pw_error"></span>
      </div>
    </div>

    <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-8">
        <div class="checkbox">
          <label><input type="checkbox"> Remember me</label>
        </div>
      </div>
    </div>

    <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-default" name="register" value="Register" disabled>
      </div>
    </div>
  </form>

  </div>
';
}
require 'template.php'
 ?>