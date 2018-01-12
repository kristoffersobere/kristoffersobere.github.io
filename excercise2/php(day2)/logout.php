<?php 
session_start();
session_destroy();
echo '<script type="text/javascript">alert("you are loggedout!");</script>
<script type="text/javascript">window.location.assign("homepage.php");</script> ';
?>

