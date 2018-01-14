<?php
include 'functions/oops.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php getTitle(); ?></title>

	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body>


	<h1><?php getTitle(); ?></h1>

<div id="div1">
	<div id="div2" style="background:#98bf21;position:absolute;">
		<form method="POST">
			<?php getLyrics($counter); ?>
			<input class="btn" type="submit" name="nextDay" id="next" value="Next Day">
			<input type="hidden" name="counter" value="<?php echo $counter ?>">
		</form>
	</div>

</div>

	<script type="text/javascript">


	        
	$(document).ready(function(){
    $("#next").click(function(){

        var div = $("#div2");  
       div.animate({fontSize: '3em'}, "slow");
       
        

    });
	});
        
	</script>	


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/"></script>



</body>
</html>