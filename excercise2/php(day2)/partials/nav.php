<?php 
$username = "";
if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];
}


?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><?php echo  strtoupper($username); ?></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="Homepage.php">Home</a></li>
      <li><a href="Menu.php">Menu</a></li>
      <li><a href="About.php">About</a></li>
      <li><a href="ContactUs.php">ContactUs</a></li>
 
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php  if (isset($_SESSION['username'])) {?>
       <li><a href='logout.php'><span class='glyphicon glyphicon-user'></span>Logout</a></li> 
      
     
     <?php } ?>
    </ul>
  </div>
</nav>

