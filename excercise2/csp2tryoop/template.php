<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php displayTitle(); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- import bootstrap -->
	<!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"> -->

</head>
<body>
	<?php require 'partials/nav.php'; ?>

<div class="container">

<h2><?php echo displayTitle().'<br>' ; ?></h2>

	<div class="row">
		<div class="col-lg-10">

			<?php displayContent(); ?>

	
	


		
			</div>
		
			<?php require 'partials/sidebar.php'; ?>

	</div>

</div>

<script type="text/javascript" src="js/externaljs.js"></script>
<?php require 'partials/footer.php'; ?>

</body>
</html>