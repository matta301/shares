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

	// echo '<pre>' . print_r($titleArray, true) . '</pre>';

?>	

	<div>
		<ul>
			<?php
				foreach ($titleArray as $oneTitle) {
					$output  = '<li class="mdl-list__item">';
					$output .=  	'<span class="mdl-list__item-primary-content">';
					$output .=		'<i class="material-icons mdl-list__item-icon">description</i>';
					$output .=  		$oneTitle;
					$output .= '</li>';


					echo $output; 
				}
			?>
			
		</ul>
	</div>



<?php include 'footer.php'; ?>