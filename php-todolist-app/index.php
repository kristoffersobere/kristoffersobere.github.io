<?php 

$todos = file_get_contents('assets/todos.json');
$todos = json_decode($todos, true);


?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0,maximum-scale=1.0>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">

	<title>PHP todo-list</title>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<!-- font awesome cdn -->
	<script src="https://use.fontawesome.com/c5d1608731.js"></script>
	<!-- Compiled and minified CSS -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  	<!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  	<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">

</head>
<body>

	<div class="container">

		<div class="row valign-wrapper center-align">
		        <div class="col s12 m12 l12 bla">
		          <div class="card-panel bla">
		            <div class="card-image">
		              <img class="responsive-img" src="assets/img/aw.jpg">
		             <h3 ><span>To-Duh</span></h3>
		            </div>
		            <div class="card-content">
		              <input type="text" id="newTask" placeholder="Add new Task">
		              <ul>
							<?php 
								foreach ($todos as $key => $todo) {
									if ($todo['done'] === false) {
									
										echo '<li id="'.$key.'"><span> <i class="fa fa-trash fa-2x"></i></span>'.$todo['task'].'</li>'; 
									} else {
										echo '<li class = "completed" id='.$key.'><span> <i class="fa fa-trash"></i></span>'.$todo['task'].'</li>'; 
									}
									
								}
							?>
						</ul>
		            </div>	            	
						
		          </div>
		        </div>
		 </div>

	</div>

<!-- import jquery -->
<script type="text/javascript" src="assets/lib/jquery-3.2.1.min.js"></script>
<!-- external js -->
<script type="text/javascript" src="assets/js/todos.js"></script>

</body>
</html>