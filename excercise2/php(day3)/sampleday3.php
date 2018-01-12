<?php 
function getuser()
{
	if (isset($_GET['submit'])) {
		$username = $_GET['username'];
		return $username;
		header('Location: index.php');
	}
}
	

?>