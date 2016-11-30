<?php 
	
	include 'header.php' ;

	$file = file_get_contents('data.json');

	// decode the JSON into an associative array
	$json = json_decode($file, true);

	foreach ($json as $reportType) {

		$titleArray [] = $reportType['report-type'];

		// Remove duplicate report type headings
		$titleArray = array_unique($titleArray);


		//echo '<pre>' . print_r($reportType, true) . '</pre>';
	}

	

?>	

	<div>
		<ul>
			<?php
				foreach ($titleArray as $oneTitle) { ?>
					<li class="mdl-list__item">
						<span class="mdl-list__item-primary-content">
						<i class="material-icons mdl-list__item-icon">description</i>
						<?php echo $oneTitle; ?>
					</li>

					
					<?php 
						//echo $reportType['date']; 
						foreach ($json as $value) {

							//echo '<pre>' . print_r($value, true) . '</pre>';

							if ($oneTitle == $value['report-type']) {
								echo '<h5>' . $value['date'] . '</h5>';
								echo '<p>' . $value['companies'] . '</p>';
							}
							
						}

					?>



			<?php } ?>
		</ul>
	</div>



<?php include 'footer.php'; ?>