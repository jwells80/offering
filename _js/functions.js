function tableDataGet(row, table) {
	var tableData = $(row).closest('tr').children('td')
	    .map(function () {
	        return $(this).text();
	    }).get();
    var props = $(table + ' thead > tr th');
    var array = [];
    props.each(function () { array.push($(this).text()) });
    obj = {};
    for (var i = 0; i < tableData.length; i++) {
	        obj[array[i]] = tableData[i];
	    }
	return obj;
}
function optionBox(option) {
	var table = '';
	if (option === '#memberName') { table = 'members'; }
	else if (option === '#fundSelect') { table = 'fund'; }
	else if (option === '#paytypeSelect') { table = 'paytype'; }
	else { table = 'none';}
	$.post('_includes/optionBox.php', {
	 table: table 
	}, function(data) {
		$(option).html(data);
	});
	
}
function infoSubmit(type, table) {
	var file = '_includes/' + type + '.php';
	var datainput = {};
	if (table === 'offering') {
		var date = $('#dateinput').val();
		var name = $('#memberName').val();
		var amount = $('#amount').val();
		var fund = $('#fundSelect').val();
		var paytype = $('#paytypeSelect').val();
		var CkNum = $('#checkNumber').val();
		var offeringid = $('#offeringid').val();
		datainput = { offeringdate: date, memberid: name, amount: amount, fund: fund,
			paytype: paytype, CkNum: CkNum, offeringid: offeringid, table: table};
	} 
	if (table === 'member') {
		var firstname = $('#Firstmembername').val();
		var lastname = $('#Lastmembername').val();
		var spouse = $('#spouse').val();
		var address = $('#address').val();
		var city = $('#city').val();
		var state = $('#st').val();
		var zip = $('#zip').val();
		var memberid = $('#memberid').val();
		datainput = { firstname: firstname, lastname: lastname, spouse: spouse,
			address: address, city: city, state: state, zip: zip, table: table, memberid: memberid };
	}
	if (table === 'fund') {
		var fund = $('#fundnewinput').val();
		var fundID = $('#fundID').val();
		datainput = { fund: fund, fundID: fundID, table: table }
	}
	if (table === 'paytype') {
		var paytype = $('#paytypenewinput').val();
		var paytypeID = $('#paytypeID').val();
		datainput = { paytype: paytype, table: table }
	}
	$.post(file, datainput, function(data) {
		if (table === 'offering') { $('#Offering').trigger('reset'); }
		if (table === 'member') { $('#Members').trigger('reset'); }
		if (table === 'fund') { $('#Fund').trigger('reset'); }
		if (table === 'member') { $('#Paytype').trigger('reset'); }
		console.log(data);
	});
	var htmltable = '#' + table + 'table';
	$(htmltable + ' tbody').html();
	createTable(table);

}
function editBtn(inputtable) {
	var htmltable = '#' + inputtable + 'table';
	var idtable = htmltable + ' .editbtn';
	$(idtable).click(function(e) {
		e.preventDefault();
		var row = $(this);
		var table = '';
		tableDataGet(row, htmltable);
		if (inputtable === 'offering') {
			$('#dateinput').val(obj['Date']);
			$('#memberName').val(obj['member_id']);
			$('#amount').val(obj['Amount']);
			$('#fundSelect').val(obj['fundID']);
			$('#paytypeSelect').val(obj['paytypeID']);
			$('#checkNumber').val(obj['CheckNumber']);
			$('#offeringid').val(obj['offering_id']);
		}
		if (inputtable === 'member') {
			var name = obj['Name'].split(", ");
			$('#Firstmembername').val(name[1]);
			$('#Lastmembername').val(name[0]);
			$('#address').val(obj['Address']);
			$('#city').val(obj['City']);
			$('#st').val(obj['St']);
			$('#zip').val(obj['Zip']);
			$('#memberid').val(obj['member_id']);
			var children = obj['Children'].split(", ");
			console.log(children);
		}
		if (inputtable === 'fund') {
			$('#fundnewinput').val(obj['Fund']);
			$('#fundID').val(obj['Fund ID']);
		}
		if (inputtable === 'paytype') {
			$('#paytypenewinput').val(obj['PayType']);
			$('#paytypeID').val(obj['PayType ID']);
		}
		$(htmltable + ' tbody').html();
		createTable(table);
	});
}
function deleteBtn(inputtable) {
	var htmltable = '#' + inputtable + 'table';
	var idtable = htmltable + ' .deletebtn';
	var datainput = {};
	var table = '';
	$(idtable).click(function(e) {
		e.preventDefault();
		var row = $(this);
		tableDataGet(row, htmltable);
		switch(inputtable) {
			case "offering":
				var offeringid = obj['offering_id'];
				datainput = {table: inputtable, offeringid: offeringid};
				break;
			case "member":
				var memberid = obj['member_id'];
				datainput = {table: inputtable, memberid: memberid};
				break;
			case "fund":
				var fundID = obj['Fund ID'];
				datainput = {table: inputtable, fundID: fundID};
				break;
			case "paytype":
				var paytypeID = obj['PayType ID'];
				datainput = {table: inputtable, paytypeID: paytypeID};
				break;
			default:
				break;
		}
		var choice = confirm('Do you want to delete this entry?');
		console.log(choice);
		if (choice) {
			$.post('_includes/delete.php', datainput, function(data) {
				$(htmltable + ' tbody').html();
				createTable(inputtable);
			});
		}
	});
}
function createTable(table) {
	$.post('_includes/table.php', {
		table: table
	}, function(data) {
		var htmltable = '#' + table + 'table';
		var tbody = htmltable + ' > tbody'
			$(tbody).html(data);
			editBtn(table);
			deleteBtn(table);
	});		
}
function buttons() {
	$('#offeringbtn').click(function(e) {
		e.preventDefault();
		$('#offeringtable').show();
		createTable('offering');
	});
	$('#memberbtn').click(function(e) {
		$('#membertable').show();
		e.preventDefault();
		createTable('member');
	});
	$('#offeringnewbtn').click(function(e) {
		e.preventDefault();
		infoSubmit('new', 'offering');
		if ($('#offeringtable').is(":visible")) {
			$('#offeringtable tbody').html();
			createTable('offering');
		}
	});
	$('#offeringupdatebtn').click(function(e) {
		e.preventDefault();
		infoSubmit('edit', 'offering')
		$('#offeringtable tbody').html();
		createTable('offering');
	});
	$('#membernewbtn').click(function(e) {
		e.preventDefault();
		infoSubmit('new', 'member');
		if ($('#membertable').is(":visible")) {
			$('#membertable tbody').html();
			createTable('member');
		}
	});
	$('#memberupdatebtn').click(function(e) {
		e.preventDefault();
		infoSubmit('edit', 'member')
		$('#membertable tbody').html();
		createTable('member');
	});
	$('#fundnewbtn').click(function(e) {
		e.preventDefault();
		infoSubmit('new', 'fund');
		$('#fundtable tbody').html();
		createTable('fund');
	});
	$('#fundupdatebtn').click(function(e) {
		e.preventDefault();
		infoSubmit('edit', 'fund')
		$('#fundtable tbody').html();
		createTable('fund');
	});
	$('#paytypenewbtn').click(function(e) {
		e.preventDefault();
		infoSubmit('new', 'paytype');
		$('#paytypetable tbody').html();
		createTable('paytype');
	});
	$('#paytypeupdatebtn').click(function(e) {
		e.preventDefault();
		infoSubmit('edit', 'paytype')
		$('#paytypetable tbody').html();
		createTable('paytype');
	});
}
