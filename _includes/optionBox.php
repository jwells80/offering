<?php
	require 'conn.php';
	$table = $_POST['table'];
	
	$query = "SELECT * FROM ${table}";
	if ($table === 'members') {
		$query .= " ORDER by last_name;";
	} 
	selectPull($query, $conn, $table);