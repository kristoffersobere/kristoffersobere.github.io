<?php 
$username = "";
if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];
}


?>
 <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

        <a class="navbar-brand" href="#"><img src="" alt="">utube</a>
        <a class="navbar-brand" href="#"> 
        <div class="logo col-xs-12">
          <span><?php echo  strtoupper($username); ?></span>
        </div><!--  -->
        </a><!-- /a -->
        </div><!-- /navbar -->

      <div id="navbar2" class="navbar-collapse collapse">
         <ul class="nav navbar-nav navbar-right">
          <li><a href="Homepage.php">Home</a></li>
          <li><a href="Menu.php">Menu</a></li>
          <li><a href="About.php">About</a></li>

          <li><a href="ContactUs.php">ContactUs</a></li>
            <?php  if (isset($_SESSION['username'])) {?>
              <li><a href='logout.php'><span class='glyphicon glyphicon-user'></span>Logout</a></li> 
      
     
            <?php }else { ?>
              <li class="waves-effect waves-dark"><a href="#" data-toggle="modal" data-target="#ModalSignIn"><span class="fa fa-user"></span> Sign in</a></li>
            <?php } ?>
            </ul>
        
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>

  <div id="ModalSignIn" class="modal fade" role="dialog">
    <div id="ModalSignIn" class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Sign in</h4>
        </div>
      <div class="modal-body">
       <form class="form-inline" action="authenticate.php" method="POST" id="form-login" >
        
              <div class="input-field text-center">        
                  <label for="name" class="" >Username: <input type="text" name="username" class="form-control" 
                  id="name" required data-validation-required-message="Please enter your username"></label> 

                  <label for="password" class="" >Password: <input type="password" class="form-control" id="pass" name="password" required data-validation-required-message="Please enter your password"> </label> <br>
               
               <input type="submit" class="btn btn-primary" name="submit" value="Sign In"><hr>
                <h4 class="text-center">OR</h4>
                <a href="register.php">Register free account</a>
       
              </div> 
         </form>

     </div>

    </div>
  </div>
</div>

