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



	$companyName = $epic = $quantity = $price = $stop = $target = $buyDate = '';


	
	//$tradeResults = displayInvestments();

	//echo '<pre>' . var_dump($results) . '</pre>';

	//echo '<pre>' . print_r($results) . '</pre>';




	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$companyName = test_input($_POST['company-name']);
		$epic 		 = test_input($_POST['epic']);
		$quantity 	 = test_input($_POST['quantity']);
		$price 		 = test_input($_POST['price']);
		$stop 		 = test_input($_POST['stop']);
		$target 	 = test_input($_POST['target']);
		$buyDate 	 = test_input($_POST['buy-date']);

		
		echo '<pre>' . var_dump($companyName) . '</pre>';


		if (! empty($companyName)) {			

			$query = "INSERT INTO `investedin`(`company`, `epic`, `quantity`, `price`, `stop`, `buy_date`, `target`) 
					  VALUES ('$companyName', '$epic', '$quantity', '$price', '$stop', '$buyDate', '$target')";


		  	$insert = $conn->query($query);

		  	if ($insert === TRUE) {

		  		$newRecord = 'A new record has beeen created';
		  		$open = '';
		  		
		  	}else {
		  		  echo "Error: " . $insert . "<br>" . $conn->error;
		  	}

		}else {

			$error = "Please fill in the following details";
			$open = 'open';

		}


		
	}





?>
	
	<div class="mdl-grid">		
		<div class="mdl-cell mdl-cell--10-col" style="">
			<button id="show-add-new-dialog" type="button" class="add-new mdl-button mdl-js-button mdl-button--raised mdl-button--accent"><i class="material-icons">playlist_add</i>Add New Record</button>
			<?php if (isset($newRecord)) { echo '<div class="new-record">' . $newRecord . '</div>'; } ?>
		</div>
		<div class="mdl-cell mdl-cell--10-col" style="">			
			<table class="matts-trade-table trade-table mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
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
		

		<!-- ADD NEW RECORD TO THE TRADE TABLE -->
		<dialog class="mdl-dialog add-new-investment" <?php if (isset($open)) { echo $open; } ?>>
			<div class="close-button close"><i class="material-icons">clear</i></div>
			<h5 class="mdl-dialog__title">Add New Share</h5>
			<div class="mdl-dialog__content">				
				<?php if (isset($error)) { echo $error; } ?>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="company-name" name="company-name">
						<label class="mdl-textfield__label" for="company-name">Company Name</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="epic" name="epic">
						<label class="mdl-textfield__label" for="epic">Epic</label>
					</div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="quantity" name="quantity">
						<label class="mdl-textfield__label" for="quantity">Quantity</label>
						<span class="mdl-textfield__error">Input is not a number!</span>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="price" name="price">
						<label class="mdl-textfield__label" for="price">Price</label>
						<span class="mdl-textfield__error">Input is not a number!</span>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="stop" name="stop">
						<label class="mdl-textfield__label" for="stop">Stop</label>
						<span class="mdl-textfield__error">Input is not a number!</span>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="target" name="target">
						<label class="mdl-textfield__label" for="target">Target</label>
						<span class="mdl-textfield__error">Input is not a number!</span>						
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="buy-date" name="buy-date">
						<label class="mdl-textfield__label" for="buy-date">Buy Date</label>
					</div>				


					<div>
						<input class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" type="submit" value="submit">
					</div>
				</form>
			</div>			
		</dialog>


		<!-- UPDATE EXISTING RECORD -->
		<dialog class="mdl-dialog edit-investment" <?php if (isset($open)) { echo $open; } ?>>
			<div class="close-button close-edit"><i class="material-icons">clear</i></div>
			<h5 class="mdl-dialog__title">Edit Share</h5>
			<div class="mdl-dialog__content">
				
				<?php if (isset($error)) { echo $error; } ?>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					
					<div>
						<input class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" type="submit" value="submit">
					</div>
				</form>
			</div>
			<!-- <div class="mdl-dialog__actions">
				<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Submit</button>
			</div> -->
		</dialog>
	</div>
		
<?php include 'footer.php'; ?>