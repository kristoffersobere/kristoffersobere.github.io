<?php 
$id = $_POST['id'];

$todos = file_get_contents('assets/todos.json');
$todos = json_decode($todos, true);

//delete task from array  $todos
array_splice($todos, $id, 1);
//update json file
$file = fopen('assets/todos.json', 'w');
	fwrite($file, json_encode($todos, JSON_PRETTY_PRINT));
	fclose($file);
	
//echo $id;
//var_dump($todos);
 ?>