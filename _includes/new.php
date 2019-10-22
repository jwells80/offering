<?php
	require 'conn.php';
	$query = '';
	$table = $_POST['table'];
	if ($table != 'member') {
		if ($table === 'offering') {
			$query = "INSERT into offering (member_id, offering_date, amount, Fund, paytype";
			if ($_POST['CkNum'] != '') {
				$query .= ", Ck_Num)";
			} else {
				$query .= ")";
			}
			$query .= " VALUES ({$_POST['memberid']}, '{$_POST['offeringdate']}', {$_POST['amount']}, {$_POST['fund']}, {$_POST['paytype']}";
			if ($_POST['CkNum'] != '')	{
				$query .= ", {$_POST['CkNum']})";
			} else {
				$query .= ")";
			}
			echo $query;
		}
		
		if ($table === 'paytype') {
			$paytype = mysql_real_escape_string($_POST['paytype']);
			$query = "INSERT into paytype (paytype) Values ('{$paytype}')";
		}
		if ($table === 'fund') {
			$fund = mysql_real_escape_string($_POST['fund']);
			$query = "INSERT into fund (fund) Values ('{$fund}')";
		}
		$results = mysql_query($query, $conn);
		mysql_free_result($results);
		if (! $results) {
			die('Could not update data: '.mysql_error());
		}
	}
	if ($table === 'member') {
		$firstname = mysql_real_escape_string($_POST['firstname']);
		$lastname = mysql_real_escape_string($_POST['lastname']);
		$address = mysql_real_escape_string($_POST['address']);
		$city = mysql_real_escape_string($_POST['city']);

		$query = "INSERT into members (first_name, last_name, address, city, st, zip_code) Values ('{$firstname}', '{$lastname}', '{$address}', '{$city}', '{$_POST['state']}', {$_POST['zip']})";
		echo $query;
		$results = mysql_query($query, $conn);
		$member_id = mysql_insert_id();
		$spouse = mysql_real_escape_string($_POST['spouse']);
		$query = "INSERT INTO family (family_id, spouse) Values ({$member_id}, '{$spouse}')";
		$results = mysql_query($query, $conn);
		if (! $results) {
			die('Could not update data: '.mysql_error());
		}
	}
	echo $query;
	mysql_close($conn);	