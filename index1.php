<?php

	require __DIR__ . "/vendor/autoload.php";

	use Goutte\Client;

	// Initialize object
	$client = new Client();

	// Issue GET request to URI
	$crawler = $client->request("GET", "http://www.hl.co.uk/shares/financial-diary?month=11&year=2016");
	



	// 1) loop over all data from page and push all relevent data to array

	// Retrieves the current days of the month
	$currentdays = intval(date("t"));


	$array = '';
	
	


?>
<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>The HTML5 Herald</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">


	<!--[if lt IE 9]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
	<![endif]-->
</head>
<body> 	

  	<h3>AGMs for <?php echo date("F")?></h3>

	<?php 

	$arrayName = array();


	// Loops over total amount of days in month
	for ($i = 0; $i < $currentdays; $i++) { 
			
		$daysOfMonth = $i + 1;

		// AGM -- Returns all data for that month of AGM
		$crawler->filter('#d' . $daysOfMonth . '-agms-events')->each(function ($node) {

			$agmString = $node->text();

			// Removes AGM title from string
			$string = str_replace('AGMs', '', $agmString);
			// Removed white space from beginning and end of string
			$string = trim($string);

			// Split Date from string
			$string = preg_split('/(\d{2}\/\d{2}\/\d{4})/', $string, null, PREG_SPLIT_DELIM_CAPTURE);

			//var_dump($string);
			//exit();


			
			//$array = explode(") ", $string);
			$arrayName[] = array(
								"date" => $string[1],
								"companies" => $string[2]
							);


			//echo '<pre>' . var_dump($arrayName) . '</pre>'; 


			echo $arrayName[0]["date"] . '<br/>';
			echo $arrayName[0]["companies"] . '<br/>';

			//echo '<h3>' . $arrayName[1] . '</h3>';


								

		});		
	} 

	?>

	<script src="https://code.jquery.com/jquery-3.1.1.min.js"integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
</body>
</html>