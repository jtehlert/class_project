<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php
		if(!isset($title))
		{
			$title = "Class Notebook";
		}

		if(!isset($description))
		{
			$description = "The note taking application for CS 4352 at UT Dallas";
		}
	?>
	<title><?php echo $title; ?></title>
	<meta name="description" content="<?php echo $description; ?>">

  	<link rel="stylesheet" href="http://<?php echo ($_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\'));?>/assets/css/skeleton.css">
  	<link rel="stylesheet" href="http://<?php echo ($_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\'));?>/assets/css/layout.css">
  	<link rel="stylesheet" href="http://<?php echo ($_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\'));?>/assets/css/sweet-alert.css">
  	<link href='http://fonts.googleapis.com/css?family=Open+Sans:800,600,400' rel='stylesheet' type='text/css'>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://<?php echo ($_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\'));?>/assets/js/load_clippings.js"></script>
  	<script type="text/javascript" src="http://<?php echo ($_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\'));?>/assets/js/sweet-alert.min.js"></script>
</head>
<body>

<div class="container">

	<div class="row sixteen columns">
		<div id="header">
			<div id="logo">
				<a href=""><span>Class</span>Notebook</a>
			</div>
			<div id="logout">
				<a href="logout.php">Logout</a>
			</div>
		</div>
	</div>
