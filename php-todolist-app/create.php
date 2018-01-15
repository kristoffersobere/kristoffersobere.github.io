<?php  
$newTask = $_POST['task'];

$todos = file_get_contents('assets/todos.json');

$todos = json_decode($todos,true);

//append new task to array $todos
array_push($todos, array('task' => $newTask, 'done' => false));

//update json file
$file = fopen('assets/todos.json', 'w');
	fwrite($file, json_encode($todos, JSON_PRETTY_PRINT));
	fclose($file);

//echo $todos;
//var_dump($todos);

//return id of new task to front-end
$id = count($todos)-1;
echo $id;
?>