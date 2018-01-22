
<?php 


function displayTitle(){
	echo 'Homepage';
}

function displayContent() {
	date_default_timezone_set('ASIA/MANILA'); 
	$date_now = date("Y-m-d",strtotime( "+7 days"));
	$date_later = date("Y-m-d",strtotime( "+8 days"));
	$datetime = date("Y-m-d H:i:s");
	echo "	
 		<div class='well'><div class='row'><form class='center' action='reservation.php' method='POST' name='theform'>
 		   
 			<div class='col-sm-7 text-center'>
 				<br>
 			
 				<div class='form-group'>

 					<label for='date'>Check-in: </label>
 					<input type='text' name='checkin' id ='datepicker' readonly='readonly' style='cursor:pointer; background-color: #FFFFFF' required value='$date_now'>

 				</div>

 				<div class='form-group'>

 					<label for='date'>Check-out: </label>
 					<input type='text' name='checkout' id ='datepicker1' readonly='readonly' style='cursor:pointer; background-color: #FFFFFF'   required value='$date_later'>

 				</div>

 				<div class='form-group'>

 					<label for='date'>Pax: </label>
 					<input type='number' min='1' max='10' name='adults' style=' background-color: #FFFFFF'   required>

 				</div>

				<input type = 'submit' class='btn btn-success' name ='search' value = 'Check Availability'>
 			</div>
 			<div class='col-sm-5 text-center'>
 				<input type='button' value='Policy' class='btn btn-danger'><br>
 				<br>
			 	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur.</p>
 			</div>


 		</form></div></div>

 		<div class='well'><div class='row'>
 		  
 					
 			<div class='col-sm-12 text-center'>

 				<br>
			 	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. 
				 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
 			</div>


 
 	</div>
 </div>
 	
 	";



}

require 'template.php';



?>