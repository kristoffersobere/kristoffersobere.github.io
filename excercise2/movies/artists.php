<?php 
require 'connection.php';

if (isset($_POST['submit'])) {

		$new_name = $_POST['name'];

		$sql =  "INSERT INTO artists (name)
				VALUES ('$new_name')";
		mysqli_query($conn,$sql);
	}

	if (isset($_GET['index'])) {
		$id = $_GET['index'];
		$sql = "DELETE FROM artists WHERE id = $id";
		mysqli_query($conn,$sql);

	}

?>

 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Songs Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--  <link rel="stylesheet" href="assets/style.css"> -->

 
</head>
<body>
<div class="container">

<?php 
echo "<h3>SONGS</h3>";
echo "<table border=1>
<tr>

<th>name</th>

</tr>";
$sql = "SELECT * FROM artists";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){
	$id = $row['id'];
	$name = $row['name'];
	
	echo "<tr>

	
			<td>$name</td>
			<td><a href='artists.php?index=$id'><button>Delete</button></a></td>

		  </tr>";
}
echo "</table>";

?>


<h3>Add Song:</h3>
<form method="POST">
	name: <input type="text" name="name"><br>
	<input class="btn btn-primary" type="submit" name="submit" value="Save">
</form>

</div>


</body>
</html>