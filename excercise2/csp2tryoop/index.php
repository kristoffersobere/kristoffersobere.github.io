<?php 
require_once 'core/init.php';

$userInsert = DB::getInstance()->update('users',3 , array(
	'password'=> 'camel',
	'name'=> 'camille'
));



/*for checking*/
/*if (!$user->count()) {
	echo 'no user';
}else {
	echo $user->first()->username;
	
}
*/
?>