<?php
	require 'conn.php';

	$query = '';
	$table = $_POST['table'];
	if ($table === 'offering') {
		$query = "DELETE FROM offering WHERE offering_id = {$_POST['offeringid']}";
	}
	/*if ($table === 'member') {
		$query = "DELETE FROM member WHERE member_id = {$_POST['memberid']}";
	}*/
	if ($table === 'fund') {
		$query = "DELETE FROM fund WHERE fundID = {$_POST['fundID']}";
	}
	if ($table === 'paytype') {
		$query = "DELETE FROM paytype WHERE paytypeID = {$_POST['paytypeID']}";
	}
	echo $query;
	$results = mysql_query($query, $conn);
	mysql_free_result($results);

	if (! $results) {
		die('Could not update data: '.mysql_error());
	}
	mysql_close($conn);	