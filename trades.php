<?php 
	
	include 'header.php' ;	

	//echo '<pre>' . print_r($titleArray, true) . '</pre>';
?>
	
	<div class="mdl-grid">
		<?php if (isset($errorMsg)) { echo $errorMsg; } ?>
		<div class="mdl-cell mdl-cell--10-col" style="">
			<button id="add-new" type="button" class="add-new mdl-button mdl-js-button mdl-button--raised mdl-button--accent"><i class="material-icons">playlist_add</i>Add New Record</button>
			<?php if (isset($newRecord)) { echo '<div class="new-record">' . $newRecord . '</div>'; } ?>
		</div>
		<div class="mdl-cell mdl-cell--10-col" style="">			
			<table id="example3" class="matts-trade-table trade-table mdl-data-table mdl-js-data-table mdl-shadow--2dp">
				<thead>
					<tr>
						<th class="">#</th>
						<th class="mdl-data-table__cell--non-numeric">Company</th>
						<th class="mdl-data-table__cell--non-numeric">Epic</th>
						<th class="mdl-data-table__cell--non-numeric">Qty</th>
						<th class="mdl-data-table__cell--non-numeric">Price</th>
						<th class="mdl-data-table__cell--non-numeric">Stop</th>
						<th class="mdl-data-table__cell--non-numeric">Target</th>
						<th class="mdl-data-table__cell--non-numeric">Buy Date</th>
						<th class="mdl-data-table__cell--non-numeric">Sell Date</th>
						<th class="profit-loss mdl-data-table__cell--non-numeric">P/L</th>
					</tr>
				</thead>
				<tbody>
					<?php displayInvestments(); ?>
				</tbody>
			</table>
		</div>	
	</div>
		
<?php include 'footer.php'; ?>