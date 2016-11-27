	




			</div>
		</main>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <script type="text/javascript" src="plugins/polyfill/dialog-polyfill.js"></script>
    <script type="text/javascript">

    	//var editTrade = $('input[type="checkbox"]');


    	$(document).ready(function () { 

    		var addNewDialog = document.querySelector('.add-new-investment');
		    var showDialogButton = document.querySelector('#show-add-new-dialog');
		    
		    if (! addNewDialog.showModal) {
		    	dialogPolyfill.registerDialog(addNewDialog);
		    }
		    
		    showDialogButton.addEventListener('click', function() {
		      	addNewDialog.showModal();
		    });
		    
		    addNewDialog.querySelector('.close').addEventListener('click', function() {
		      addNewDialog.close();
		    });




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
	    	
		    


		    
		  
		    
		    





    	});

    </script>
</body>
</html>