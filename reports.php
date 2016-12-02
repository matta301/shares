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

	<div class="mdl-grid">
		<div class="mdl-cell mdl-cell--12-col">
			<ul id="accordion">
				<?php
					foreach ($titleArray as $oneTitle) { ?>

						<li>
							<div class="accordion-toggle">
								<i class="material-icons">description</i>
								<?php echo $oneTitle; ?>
							</div>
							<div class="accordion-content">
								<?php
									foreach ($json as $value) {
										//echo '<pre>' . print_r($value, true) . '</pre>';

										if ($oneTitle == $value['report-type']) {
											echo '<h5>' . $value['date'] . '</h5>';

											$companies = $value['companies'];

											echo '<pre>' . print_r($companies, true) . '</pre>';

											//echo '<p>' . $companies . '</p>';
										}
									}
								?>
							</div>
						</li>
				<?php } ?>
			</ul>
		</div>
	</div>



<?php include 'footer.php'; ?>