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


    function displayInvestments() {

    	global $conn;

    	$sql = "SELECT * FROM `investedin` ORDER BY STR_TO_DATE(buy_date, '%d-%m-%Y') DESC";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

			foreach ($result as $value) {


				//echo '<pre>' . print_r($value) . '</pre>';

				$output  = '<tr>';
				$output .= 		'<td class="mdl-data-table__cell--non-numeric">' . $value['company'] . '</td>';
				$output .= 		'<td class="mdl-data-table__cell--non-numeric">' . strtoupper($value['epic']) . '</td>';
				$output .= 		'<td>' . $value['quantity'] . '</td>';
				$output .= 		'<td>' . $value['price'] . '</td>';
				$output .= 		'<td>' . $value['stop'] . '</td>';
				$output .= 		'<td>' . $value['target'] . '</td>';
				
				if ($value['buy_date'] != null) {
					$output .= '<td>' . date("d/m/Y", strtotime($value['buy_date'])) . '</td>';
				}else {
					$output .= '<td></td>';
				}
				
				
				if ($value['sell_date'] != null) {
					$output .= '<td>' . date("d/m/Y", $value['sell_date']) . '<td>';
				}else {
					$output .= '<td></td>';
				}				
				
				if ($value['profit_loss'] > 0) {
				
					$output .= '<td class="balance profit-up">£ ' . $value['profit_loss'] . '</td>';
				
				}elseif ($value['profit_loss'] < 0) {
				
					$output .= '<td class="balance profit-down">£ ' . $value['profit_loss'] . '</td>';
				
				}

				$output .= 		'<td class="edit s_id' . $value["s_id"] . '"><div class="show-edit-dialog"><i class="material-icons">create</i></div></td>';
				$output .= '</tr>';
				
				echo $output;
			}
		}

		$conn->close();


    }





    function addInvestment() {

		global $conn;




    }



?>