<span class="mdl-layout-title">Add a new investment to your portfolio</span>        	
<div class="mdl-dialog__content">				
	<?php if (isset($results['error'])) { echo $results['error']; } ?>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div class="mdl-textfield mdl-js-textfield">
			<input class="mdl-textfield__input" type="text" id="add-company-name" name="add-company-name">
			<label class="mdl-textfield__label" for="add-company-name">Company Name</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield">
			<input class="mdl-textfield__input" type="text" id="add-epic" name="add-epic">
			<label class="mdl-textfield__label" for="add-epic">Epic</label>
		</div>

		<div class="mdl-textfield mdl-js-textfield">
			<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="add-quantity" name="add-quantity">
			<label class="mdl-textfield__label" for="add-quantity">Quantity</label>
			<span class="mdl-textfield__error">Input is not a number!</span>
		</div>
		<div class="mdl-textfield mdl-js-textfield">
			<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="add-price" name="add-price">
			<label class="mdl-textfield__label" for="add-price">Price</label>
			<span class="mdl-textfield__error">Input is not a number!</span>
		</div>
		<div class="mdl-textfield mdl-js-textfield">
			<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="add-stop" name="add-stop">
			<label class="mdl-textfield__label" for="add-stop">Stop</label>
			<span class="mdl-textfield__error">Input is not a number!</span>
		</div>
		<div class="mdl-textfield mdl-js-textfield">
			<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="add-target" name="add-target">
			<label class="mdl-textfield__label" for="add-target">Target</label>
			<span class="mdl-textfield__error">Input is not a number!</span>						
		</div>
		<div class="mdl-textfield mdl-js-textfield">
			<input class="mdl-textfield__input" type="text" id="add-buy-date" name="add-buy-date">
			<label class="mdl-textfield__label" for="add-buy-date">Buy Date</label>
		</div>
		<div>
			<input class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" name="add-button" type="submit" value="submit">
		</div>
	</form>
</div>