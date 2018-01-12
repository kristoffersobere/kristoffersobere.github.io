<?php 
$users = [
	'admin' => 'secret',
	'kris' => 'kris',
	'user' => 'user',
	'lebron' => 'lebron',
	'kobe' => 'kobe',
	'brandon' => 'brandon',
	'michael' => 'michael',
	'dirk' => 'dirk'

];

/// to write to json file
	$file = fopen("assets/users.json", "w");
	fwrite($file, json_encode($users,JSON_PRETTY_PRINT));
	fclose($file);


?>