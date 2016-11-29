	




			</div>
		</main>
		 <div class="mdl-layout__obfuscator-right"></div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <script type="text/javascript" src="plugins/polyfill/dialog-polyfill.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">

    	//var editTrade = $('input[type="checkbox"]');


    	$(document).ready(function () { 


    		// Add new investment dialog
    		/*var addNewDialog = document.querySelector('.add-new-investment');
		    var showDialogButton = document.querySelector('#show-add-new-dialog');
		    
		    if (! addNewDialog.showModal) {
		    	dialogPolyfill.registerDialog(addNewDialog);
		    }		    
		    showDialogButton.addEventListener('click', function() {
		      	addNewDialog.showModal();
		    });
		    
		    addNewDialog.querySelector('.close').addEventListener('click', function() {
		      addNewDialog.close();
		    });*/



		    // Edit portfolio dialog
	    	var editDialog = document.querySelector('.edit-investment');
		    $('.show-edit-dialog').on('click tap', function(){ 

		    	$('.show-edit-dialog').removeClass('show-edit-dialog-active');
		    	$(this).addClass('show-edit-dialog-active');

		    	var editDialogButton = document.querySelector('.show-edit-dialog-active');

			    if (! editDialog.showModal) {
			    	dialogPolyfill.registerDialog(editDialog);
			    }
	      		editDialog.showModal();		    	
		    });
	    	editDialog.querySelector('.close-edit').addEventListener('click', function() {
		      		editDialog.close();
	    	});




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
    
		    


	        $('#add-new').click(function(){
				if($('.mdl-layout__drawer-right').hasClass('active')){
					$('.mdl-layout__drawer-right').removeClass('active'); 
			 	}
			 	else{
			    	$('.mdl-layout__drawer-right').addClass('active'); 
			 	}
			});

			$('.mdl-layout__obfuscator-right').click(function(){
				if($('.mdl-layout__drawer-right').hasClass('active')){       
			    	$('.mdl-layout__drawer-right').removeClass('active'); 
			 	}
			 	else{
			    	$('.mdl-layout__drawer-right').addClass('active'); 
			 	}
			});
  



    	});

    </script>
</body>
</html>