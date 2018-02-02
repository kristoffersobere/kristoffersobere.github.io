<?php session_start();  
	// date_default_timezone_set('ASIA/MANILA'); 
	// $date_now = date("Y-m-d",strtotime( "+3 days"));
	// $date_later = date("Y-m-d",strtotime( "+4 days"));
	// $datetime = date("Y-m-d H:i:s");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>HOTEL || <?php displayTitle(); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/style.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" media="all"
      href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css"    />
  <script src="https://use.fontawesome.com/c5d1608731.js"></script>

 

  <!-- import bootstrap -->
	<!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"> -->

</head>
<body>
	<?php require 'partials/nav.php'; ?>

<div class="container">


	<div class="row">

			<?php displayContent(); ?>
 
	</div>

</div>
 
<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>  
<script type="text/javascript" src="js/externaljs.js"></script>
<?php include  'partials/footer.php'; ?>
</body>
</html>