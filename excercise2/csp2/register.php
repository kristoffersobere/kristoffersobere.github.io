<?php 
function displayTitle(){
	echo 'Register';
}

function displayContent(){
	 echo '
<form class="form-horizontal" method="POST" action="register_endpoint.php">
    <div class="form-group">
      <label class="control-label col-sm-4" for="full_name">Full Name:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="full_name" name="name" placeholder="Enter Full Name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="username">Userame:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
        <span id="username_error"></span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="pw">Password:</label>
      <div class="col-sm-8"> 
        <input type="password" class="form-control" id="pw" name="pw" placeholder="Enter password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="cpw">Confirm Password:</label>
      <div class="col-sm-8"> 
        <input type="password" class="form-control" id="cpw" name="cpw" placeholder="Confirm password">
        <span id="pw_error"></span>
      </div>
    </div>
    <div class="form-group"> 
      <div class="col-sm-offset-4 col-sm-8">
        <div class="checkbox">
          <label><input type="checkbox"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-default" name="login" value="Register" disabled>
      </div>
    </div>
  </form>


';
}

// <form action="" method="" class="form-horizontal" > //for pure javscript form

//   <div class="form-group">
//       <label class="control-label col-sm-2" for="email">Full Name: </label>
//       <div class="col-sm-10">
//         <input type="text" class="form-control" id="email" placeholder="Full Name" name="fname" required>
//       </div>
//     </div>

//     <div class="form-group">
//       <label class="control-label col-sm-2" for="email">UserName: </label>
//       <div class="col-sm-10">
//         <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
//       </div>
//     </div>

//   <div class="form-group">
//       <label class="control-label col-sm-2" for="email">Password: </label>
//       <div class="col-sm-10">
//         <input type="password" class="form-control" id="pw" placeholder="Enter password" name="pw" required>
//       </div>
//     </div>

//   <div class="form-group">
//       <label class="control-label col-sm-2" for="email">Confirm Password: </label>
//       <div class="col-sm-10">
//         <input type="password" class="form-control" id="cpw" oninput="validatepass()" placeholder="Enter password" name="cpw" required>
//         <p id="para"></p>
//       </div>
//     </div>

//    <div class="form-group">        
//       <div class="col-sm-offset-2 col-sm-10">
//        <input type="submit" name="" value="Register" id="btn" class="btn btn-primary">
//       </div>
//     </div>

  

// </form>

require 'template.php'
 ?>

<!-- <script type="text/javascript" src="js/externaljs.js"></script> -->

