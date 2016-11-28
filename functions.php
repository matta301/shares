<?php

	$servername = "localhost";
	$username = "root";
	$password = "251458760";
	$dbname = "shareplanner";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	function test_input($data) {
		
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


	// Adds new investment to trade diary
	function addNewInvestment() {

		global $conn;

		$companyName = $epic = $quantity = $price = $stop = $target = $buyDate = '';

    	if (isset($_POST['add-button'])) {

			$companyName = test_input($_POST['add-company-name']);
			$epic 		 = test_input($_POST['add-epic']);
			$quantity 	 = test_input($_POST['add-quantity']);
			$price 		 = test_input($_POST['add-price']);
			$stop 		 = test_input($_POST['add-stop']);
			$target 	 = test_input($_POST['add-target']);
			$buyDate 	 = test_input($_POST['add-buy-date']);

			if (! empty($companyName)) {

				$query = "INSERT INTO `investedin`(`company`, `epic`, `quantity`, `price`, `stop`, `buy_date`, `target`) 
						  VALUES ('$companyName', '$epic', '$quantity', '$price', '$stop', STR_TO_DATE('$buyDate', '%Y/%m/%d'), '$target')";

			  	$insert = $conn->query($query);

			  	if ($insert === TRUE) {			  		
			  		
			  		return array('success' => 'A new record has beeen created', 'open' => '');

			  	}else {
			  		return $errorMsg = "Error: " . $insert . "<br>" . $conn->error;
			  	}

			}else {

				return array('error' => 'Please fill in the following details', 'open'  => 'open');
			}
		}
	}



	// Displays current/histroy equtiy invesments
    function displayInvestments() {

    	global $conn;

    	$sql = "SELECT * FROM `investedin` ORDER BY buy_date DESC";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

			foreach ($result as $value) { ?>

				<!-- Output for all table data -->
				<tr>
					<td class="company mdl-data-table__cell--non-numeric"><?php echo $value['company']; ?></td>
					<td class="epic mdl-data-table__cell--non-numeric"><?php echo strtoupper($value['epic']); ?></td>
					<td class="quantity"><?php echo $value['quantity']; ?></td>
					<td class="price"><?php echo $value['price']; ?></td>
					<td class="stop"><?php echo $value['stop']; ?></td>
					<td class="target"><?php echo $value['target']; ?></td>
					<td class="buy-date"><?php if ($value['buy_date'] === '0000-00-00' || $value['buy_date'] === null) {}else{ echo date("d/m/Y", strtotime($value['buy_date'])); } ?></td>
					<td class="sell-date"><?php if ($value['sell_date'] === '0000-00-00' || $value['sell_date'] === null) {}else{ echo date("d/m/Y", strtotime($value['sell-date'])); } ?></td>					
					<?php if ($value['profit_loss'] > 0) { ?>						
					<td class="balance profit-up">£ <?php echo $value['profit_loss']; ?></td>
					<?php }elseif ($value['profit_loss'] < 0) { ?>
					<td class="balance profit-down">£ <?php echo $value['profit_loss']; ?></td>
					<?php }elseif ($value['profit_loss'] == null || $value['profit_loss'] == '' || $value['profit_loss'] == 0) {?>
						<td class="balance"></td>
					<?php } ?>
					<td data-sid="<?php echo $value["s_id"]; ?>" class="edit edit-button s_id<?php echo $value["s_id"]; ?>">
						<div class="show-edit-dialog"><i class="material-icons">create</i></div>
					</td>
				</tr>

				<?php }				
		}

		// Closes DB connection
		$conn->close();
    }


    // Edit equity invesments
    function editInvestment() {

    	
    	//exit();

    	global $conn;

    	$editCompany = $editEpic = $editQuantity = $editPrice = $editStop = $editTarget = $editBuyDate = $editId = '';


    	if (isset($_POST['edit-button'])) {


    		
    		$editCompany 	= test_input($_POST['edit-company-name']);			
			$editEpic 		= test_input($_POST['edit-epic']);
			$editQuantity 	= test_input($_POST['edit-quantity']);
			$editPrice 		= test_input($_POST['edit-price']);
			$editStop		= test_input($_POST['edit-stop']);
			$editTarget 	= test_input($_POST['edit-target']);
			$editBuyDate 	= test_input($_POST['edit-buy-date']);
			$editSellDate 	= test_input($_POST['edit-sell-date']);
			$editProfitLoss	= test_input($_POST['edit-profit-loss']);
			
			$editId 		= test_input($_POST['row-id']);


			/*var_dump($editCompany);
			var_dump($editEpic);
			var_dump($editQuantity);
			var_dump($editPrice);
			var_dump($editCompany);
			var_dump($editStop);
			var_dump($editTarget);
			var_dump($editBuyDate);
			var_dump($editSellDate);
			var_dump($editOpen);
			var_dump($editId);*/
			

			//exit();



				var_dump($editCompany);
				var_dump($editEpic);
				var_dump($editQuantity);
				var_dump($editPrice);
				var_dump($editCompany);
				var_dump($editStop);
				var_dump($editTarget);
				var_dump($editBuyDate);
				var_dump($editSellDate);				
				var_dump($editId);

				$query = "UPDATE `investedin` 
						  SET `company`='$editCompany',
						  	  `epic`='$editEpic',
						  	  `quantity`='$editQuantity',
						  	  `price`='$editPrice',
						  	  `stop`='$editStop',
						  	  `target`='$editTarget',
						  	  `buy_date`='$editBuyDate',
						  	  `sell_date`='$editSellDate',
						  	  `profit_loss`='$editProfitLoss'
						  	  

						  WHERE `s_id` = '$editId'";


				$update = $conn->query($query);

				//exit();

				if ($update === TRUE) {			  		
			  		echo 'Success';
			  	}else {
			  		echo "Error: " . $update . "<br>" . $conn->error;
			  	}



		

		};


    }


?>