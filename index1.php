<?php include 'header.php' ;?>


  	<h3>AGMs for <?php echo date("F")?></h3>
	
	
	<div class="outer-container row">
	<?php

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

			// Splits the string and returns the date	
			$date = preg_split('(\s.*)', $string , null, PREG_SPLIT_DELIM_CAPTURE);
			$date = implode('', $date); 
			
			// Removes the date and splits the string after every ) bracket
			$companies = preg_split('([\)])', str_replace(range(0, 9), '', str_replace('/', '', $string)) , null, PREG_SPLIT_DELIM_CAPTURE);			
			
			$output  = 		'<div class="inner-container col s3">';
			$output .= 			'<h5>' . $date . '</h5>';
			foreach (array_filter($companies) as $key => $value) {					
				$output .= '<p>' . $value . ')</p>';
			}
			$output .= 		'</div>';			

			echo $output;

		});		
	}
	?>

	</div><!-- End of row -->

<?php include 'footer.php' ;?>