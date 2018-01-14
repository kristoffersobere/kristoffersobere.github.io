<?php 
	$name = $_POST['name'];

	$users = [
	['name' => 'Juan Mariano', 'email' => 'Juan.mariano@yahoo.com', 'password' => 'password1'],
	['name' => 'Juan Ponce Enrile', 'email' => 'Juan.Enrile@yahoo.com', 'password' => 'password2'],
	['name' => 'Jake Pempengco', 'email' => 'Jake.Shiboli@yahoo.com', 'password' => 'password3'],
];

	foreach ($users as $key => $value){
		if($value['name']=== $name){
			echo "your name was found";
			break;
			}
	}

	//echo json_encode($name);
?>