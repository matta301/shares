<?php

	require __DIR__ . "/vendor/autoload.php";
	use Goutte\Client;

	// Initialize object
	$client = new Client();

	// Issue GET request to URI
	$crawler = $client->request("GET", "http://www.hl.co.uk/shares/financial-diary?month=11&year=2016");
	
	// Retrieves the current days of the month
	$currentdays = intval(date("t"));
		
	


?>
<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>The HTML5 Herald</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">
	
 	<!-- Compiled and minified CSS -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">  


	<!--[if lt IE 9]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
	<![endif]-->

	<style type="text/css">
		.outer-container { width: 70%; }

		.inner-container:nth-child(4n+1) {
			clear: both;
		}
		.inner-container {
			border: 1px solid firebrick;
		}

	</style>
</head>
<body> 	