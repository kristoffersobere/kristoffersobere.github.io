<?php 
session_start();
$user = $_POST['username'];
$_SESSION['username'] = $_POST['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	

	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body>


<form action="index.php" method="POST">
	
	input1:<br>
	<input type="text" name="username"><br>
	<input type="password" name="username2"><br>
	<input type="submit" name="submit" value="Submit">

	

</form>	


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/"></script>



</body>
</html>