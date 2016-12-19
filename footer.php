	




			</div>
		</main>
		 <div class="mdl-layout__obfuscator-right"></div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <script src="plugins/polyfill/dialog-polyfill.js"></script>
    <script type="text/javascript" src="js/tradaryMaster.js"></script>

    <!-- <script src="plugins/tabledit/jquery.tabledit.min.js"></script>-->
    <script type="text/javascript">

    	//var editTrade = $('input[type="checkbox"]');






    	$(document).ready(function () {

    		// Called from tradayMaster.js
    		reportHighlighter();
			reportAccordian();















	    	var editButton  	 = $('.edit-button');
	    	var activeTableRow 	 = $('.edit-table-row');
	    	var editCompanyInput = $('.edit-company');
		    
	    	

	    	$(editButton).on('click tap', function(){

	    		$('.edit-button').parent('tr').removeClass('edit-table-row');
	    		$(this).parent('tr').addClass('edit-table-row');


	    		var company  = document.querySelector('.edit-table-row .company').textContent;
	    		var epic 	 = document.querySelector('.edit-table-row .epic').textContent;
	    		var quantity = document.querySelector('.edit-table-row .quantity').textContent;
	    		var price 	 = document.querySelector('.edit-table-row .price').textContent;
	    		var stop 	 = document.querySelector('.edit-table-row .stop').textContent;
	    		var target   = document.querySelector('.edit-table-row .target').textContent;
	    		var buyDate  = document.querySelector('.edit-table-row .buy-date').textContent;
	    		var sellDate = document.querySelector('.edit-table-row .sell-date').textContent;
	    		var id 		 = document.querySelector('.edit-table-row .edit-button').getAttribute('data-sid');

	    		console.log(company);
	    		console.log(epic);
	    		console.log(quantity);
	    		console.log(price);
	    		console.log(stop);
	    		console.log(target);
	    		console.log(buyDate);
	    		console.log(sellDate);
	    		console.log(id);

	    		document.getElementById('edit-company-name').value = company;
	    		document.getElementById('edit-epic').value = epic;
	    		document.getElementById('edit-quantity').value = quantity;
	    		document.getElementById('edit-price').value = price;
	    		document.getElementById('edit-stop').value = stop;
	    		document.getElementById('edit-target').value = target;
	    		document.getElementById('edit-buy-date').value = buyDate;
	    		document.getElementById('edit-sell-date').value = sellDate;
	    		document.getElementById('row-id').value = id;
	    	});

			   
		    

			



			// Sets the alert icon No. in the header section, depending on how many reports are due out for that month
			/*var alertsIcon  = document.getElementById('alerts')
			var alerts 		= document.getElementsByClassName('report-due')
			var noOfReports = alerts.length

			alertsIcon.setAttribute('data-badge', noOfReports)*/




		



		
    	});

    </script>
</body>
</html>