<?php 
if (isset($_SESSION['username'])) {
    echo "<h4>hello ".$_SESSION['username'];
}else {
?>

<!-- Sidebar -->
    <div  id="sidebar-wrapper">
 
            <div class="container-fluid">


                <form class="form-horizontal" action="authenticate.php" method="POST">

                <label class="control-label col-sm-1" for="email">Username: </label>
                <div class="form-group">
                <div class="col-sm-12">
                <input type="text" class="form-control" placeholder="Enter Username" name="username" required="">
                </div>
                </div>

                <label class="control-label col-sm-1" for="pwd">Password:</label>                
                <div class="form-group">
                <div class="col-sm-12">          
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required="">
                </div>
                </div>

                <div class="form-group">        
                <div class=" col-sm-12">
                <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
                </div>
                </div>
                </div>
                <div class="form-group">        
                <div class=" col-sm-12">
                <input type="submit" name="submit" value="Login" class="btn btn-primary" >
                </div>
                </div>
                </form>


            </div>
      
        
    </div>
    <!-- /#sidebar-wrapper -->
<?php } ?>