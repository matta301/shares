<?php 
	
	require __DIR__ . "/vendor/autoload.php";
	use Goutte\Client;

	function financialReportAPI() {		

		// Initialize object
		$client = new Client();

		// Date variables
		$month  = date('m');
		$year   = date('Y');	
		$currentdays = intval(date("t"));

	
		// Issue GET request to URI
		$crawler = $client->request("GET", "http://www.hl.co.uk/shares/financial-diary?month=". $month . "&year=" . $year . "");
		

 		// Returns finacial report data from HL
		// 1) Dates
		// 2) Companies that are due reports
		// 2) ID of the container div element
		$results = $crawler->filter('.box-hide div')->extract(array('_text', 'id'));
		$results = array_filter($results);

		// Init array that will merge all data
		$dataMerged = array();

    	foreach ($results as $value) {

    		$dataMerged[] = array_merge($value);    	
    	}


    	foreach ($dataMerged as $value) {

    		// Assigns array values to variables to be used in new array when writing to JSON
    		$id = $value[1];
    		$data = trim($value[0]);
    		
    		// Removes the date from the data string and leaves report type heading and list of companies
    		$split = preg_split('(\s\d+\/\d+\/\d+)', $data);

    		// Aqcuires the date from the sting
    		$date = preg_match('(\s\d+\/\d+\/\d+)', $data, $matches);
    		
    		$dueDate 	 	 = trim($matches[0]);
			$reportTitle 	 = trim($split[0]);
			$reportCompanies = trim($split[1]);

    		// Reorders and adds new data into an array assigned with key values 
    		// 1) element id  
    		// 2) date that the reports are due
    		// 3) Report type
    		// 4) company name
    		$values[] = array(
	    					'id' => $id,
	    					'date' => $dueDate,
	    					'report-type' => $reportTitle,
	    					'companies' => $reportCompanies,
					 	);		
    	}

    	// Writes all data to data.json file
		file_put_contents('data.json', json_encode($values, JSON_FORCE_OBJECT));
	}


	// Function that gathers info from HL
	financialReportAPI();

?>