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

	


		
	// Add a new investment
	$results = addNewInvestment();

	editInvestment();

	//echo '<pre>' . print_r($results, true) . '</pre>';

?>
	
	<div class="mdl-grid">
		<?php if (isset($errorMsg)) { echo $errorMsg; } ?>
		<div class="mdl-cell mdl-cell--10-col" style="">
			<button id="add-new" type="button" class="add-new mdl-button mdl-js-button mdl-button--raised mdl-button--accent"><i class="material-icons">playlist_add</i>Add New Record</button>
			<?php if (isset($newRecord)) { echo '<div class="new-record">' . $newRecord . '</div>'; } ?>
		</div>
		<div class="mdl-cell mdl-cell--10-col" style="">			
			<table class="matts-trade-table trade-table mdl-data-table mdl-js-data-table mdl-shadow--2dp">
				<thead>
					<tr>
						<th class="mdl-data-table__cell--non-numeric">Company</th>
						<th class="mdl-data-table__cell--non-numeric">Epic</th>
						<th class="mdl-data-table__cell--non-numeric">Qty</th>
						<th class="mdl-data-table__cell--non-numeric">Price</th>
						<th class="mdl-data-table__cell--non-numeric">Stop</th>
						<th class="mdl-data-table__cell--non-numeric">Target</th>
						<th class="mdl-data-table__cell--non-numeric">Buy Date</th>
						<th class="mdl-data-table__cell--non-numeric">Sell Date</th>
						<th class="mdl-data-table__cell--non-numeric">P/L</th>
						<th class="mdl-data-table__cell--non-numeric edit">edit</th>
					</tr>
				</thead>
				<tbody>
					<?php displayInvestments(); ?>
				</tbody>
			</table>
		</div>
		

		
		<!-- UPDATE EXISTING RECORD -->
		<dialog class="mdl-dialog edit-investment" <?php if (isset($open)) { echo $open; } ?>>
			<div class="close-button close-edit"><i class="material-icons">clear</i></div>
			<h5 class="mdl-dialog__title">Edit row</h5>
			<div class="mdl-dialog__content">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">					
					<input type="hidden" id="row-id" name="row-id" value="">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="edit-company-name" name="edit-company-name" value="">
						<label class="mdl-textfield__label" for="edit-company-name">Company Name</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-focused is-upgraded">
						<input class="mdl-textfield__input" type="text" id="edit-epic" name="edit-epic">
						<label class="mdl-textfield__label" for="edit-epic">Epic</label>
					</div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="edit-quantity" name="edit-quantity">
						<label class="mdl-textfield__label" for="edit-quantity">Quantity</label>
						<span class="mdl-textfield__error">Input is not a number!</span>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="edit-price" name="edit-price">
						<label class="mdl-textfield__label" for="edit-price">Price</label>
						<span class="mdl-textfield__error">Input is not a number!</span>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="edit-stop" name="edit-stop">
						<label class="mdl-textfield__label" for="edit-stop">Stop</label>
						<span class="mdl-textfield__error">Input is not a number!</span>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="edit-target" name="edit-target">
						<label class="mdl-textfield__label" for="edit-target">Target</label>
						<span class="mdl-textfield__error">Input is not a number!</span>						
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="edit-buy-date" name="edit-buy-date">
						<label class="mdl-textfield__label" for="edit-buy-date">Buy Date</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="edit-sell-date" name="edit-sell-date">
						<label class="mdl-textfield__label" for="edit-sell-date">Sell Date</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="edit-profit-loss" name="edit-profit-loss">
						<label class="mdl-textfield__label" for="edit-profit-loss">Profit/Loss</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="edit-profit-loss" name="edit-open-closed">
						<label class="mdl-textfield__label" for="edit-open-close">Close</label>
					</div>
					<div>
						<input class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" type="submit" name="edit-button" value="submit">
					</div>		
				</form>
			</div>
			<!-- <div class="mdl-dialog__actions">
				<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Submit</button>
			</div> -->
		</dialog>
	</div>
		
<?php include 'footer.php'; ?>