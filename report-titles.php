<?php include 'header.php' ;?>  	
	
	<div class="outer-container row">
	<?php		

		$posts = array();
		
		$reportType = $crawler->filter('a.facebox')->each(function ($node) {

			// removes (x) from string
			$titles = preg_split('(\(\d+\))', trim($node->text()));
			$titles = array_filter($titles);
			$titles = array_unique($titles);

			return $posts[] = $titles;
		});

		// Remove duplicate document sub headings
		$reportType = array_unique($reportType, SORT_REGULAR);
		
		
		// Merges arrays returned from after removing duplicates
		foreach($reportType as $value) {
    		$mergedArray[] = array_merge($value);
		}

		
		// Loop over arrays to display Report notification headings
		foreach ($mergedArray as $value) {    			
			foreach ($value as $key => $title) {
				
				echo '<p>' . $title . '</p>';

			}
		}	
	
	?>

	</div><!-- End of row -->

<?php include 'footer.php' ;?>