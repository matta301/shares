/*
    Used in applying highlighted backgrounds to report headings.
    If the date has passed and no reports are displayed a 
    background is applied on the <li> background.
*/
function reportHighlighter() {
	
	var listContainer = $('.report-item .accordion-content');

	for (var i = 0; i < listContainer.length; i++) {

		if($(listContainer[i]).children().length == 0){
			
			$(listContainer[i]).parent().css('background', '#EA9999');
		}
	};
}


/*
    Used for when adding a new item to the trading diary. 
    Opens up a sidebar that slides in from the right hand side
*/
function reportAccordian() {

    var rightDrawer = $('.mdl-layout__drawer-right');

    $('#add-new').click(function(){
        if($(rightDrawer).hasClass('active')){
            $(rightDrawer).removeClass('active');
        } else{
            $(rightDrawer).addClass('active');         
        }
    });
    $('.mdl-layout__obfuscator-right').click(function(){
        if($(rightDrawer).hasClass('active')){       
            $(rightDrawer).removeClass('active'); 
        }
        else{
            $(rightDrawer).addClass('active');
        }
    });

    $('#accordion').find('.accordion-toggle').click(function(){

        //Expand or collapse this panel
        $(this).next().slideToggle('fast');
        //Hide the other panels
        $(".accordion-content").not($(this).next()).slideUp('fast');
    });
}