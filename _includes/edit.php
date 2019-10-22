<?php
	require 'conn.php';

	$query = '';
	$table = $_POST['table'];
	if ($table != 'member') {
		if ($table === 'offering') {
			$query = "UPDATE {$table} 
				SET member_id = {$_POST['memberid']}, 
				offering_date = '{$_POST['offeringdate']}', 
				amount = {$_POST['amount']}, Fund={$_POST['fund']}, 
				paytype={$_POST['paytype']} ";
			if ($_POST['CkNum'] != '') {	
				$query .= ", Ck_Num={$_POST['CkNum']} ";
			} 
			$query .= "WHERE offering_id={$_POST['offeringid']}";
		}
		if ($table === 'paytype') {
			$paytype = mysql_real_escape_string($_POST['paytype']);
			$query = "UPDATE {$table}
				SET paytype = '{$paytype}'
				WHERE paytypeID = {$_POST['paytypeID']}";
		}
		if ($table === 'fund') {
			$fund = mysql_real_escape_string($_POST['fund']);
			$query = "UPDATE {$table}
				SET fund = '{$fund}'
				WHERE fundID = {$_POST['fundID']}";
		}
		editInfo($conn, $query, $table);
	}
	if ($table === 'member') {
		$query = "UPDATE {$table}
			SET first_name = '{$_POST['firstname']}', 
			last_name = '{$_POST['lastname']}', 
			address = '{$_POST['address']}', 
			st = '{$_POST['state']}', 
			zip_code = {$_POST['zip']}
			WHERE member_id = {$_POST['memberid']}";
		editInfo($conn, $query, $table);
		if (isset($_POST['spouse'])) {
			$query = "UPDATE family
				SET spouse = '{$_POST['spouse']}'
				WHERE family_id = {$_POST['memberid']}";
			editInfo($conn, $query, $table);	
		}
	}
	echo $query;