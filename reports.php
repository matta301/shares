<?php 
	
	include 'header.php' ;

	$file = file_get_contents('data.json');

	// decode the JSON into an associative array
	$json = json_decode($file, true);

	foreach ($json as $reportType) {

		$titleArray [] = $reportType['report-type'];

		// Remove duplicate report type headings
		$titleArray = array_unique($titleArray);
	}



	$todaysDate = date('d/m/Y');
	echo $todaysDate;

	

?>
<div class="mdl-grid">
	<div class="mdl-cell mdl-cell--12-col">
		<ul id="accordion">
			<?php
				foreach ($titleArray as $oneTitle) { 
					$oneTitleId = strtolower(str_replace(' ', '-', $oneTitle));
			?>

					<li id="<?php echo $oneTitleId; ?>" class="report-item">
						<div class="accordion-toggle">
							<i class="material-icons">description</i>
							<?php echo $oneTitle; ?>
						</div>
						<div class="accordion-content">
							<?php
								foreach ($json as $value) {
									if ($oneTitle == $value['report-type']) {

										// If the report due date has passed then it will not display in the dashboard
										if ($value['date'] >= $todaysDate) { ?>

											<h5><?php echo $value['date']; ?></h5>
											<?php
												foreach ($value['companies'] as $key => $value) {														
													echo '<p class="report">(' . trim($key) . ') ' . $value . '</p>';
												}
											?>
								  <?php }
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