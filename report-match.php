<?php
	
	include 'header.php';

	

	$reportsDue = matchingCompanies($json);

?>

<div class="mdl-grid">
	
	<?php foreach ($reportsDue as $key => $value) { ?>
		 	
	 	<p><?php echo $value; ?></p>

	<?php } ?>				

</div>

<?php include 'footer.php'; ?>