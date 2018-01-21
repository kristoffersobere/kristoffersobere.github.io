<?php  
session_start();

//set to global array para ma call sa ibang class
$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => '127.0.0.1', 
		'username' => 'root',
		'password' => '',
		'db' => 'reserve'
	), 
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => 604800 
	),
	'session' => array(
		'session_name' => 'user'
	)


);

//function para macall lahat ng classes
spl_autoload_register(function ($class){
	require_once 'classes/'.$class.'.php';
}
);

require_once 'functions/sanitize.php';

?>