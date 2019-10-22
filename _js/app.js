$(document).ready(function() {
	//Tabs activation
	$('.nav-tabs a').click(function(e) {
		e.preventDefault();
		$(this).tab('show');
	});
	//Initial Routines
	$('#offeringtable').hide();
	$('#membertable').hide();
	optionBox('#memberName');
	optionBox('#fundSelect');
	optionBox('#paytypeSelect');
	createTable('fund');
	createTable('paytype');

	// Buttons
	buttons();
	$( "#dateinput" ).datepicker({
		dateFormat: "yy-mm-dd"
	});

});