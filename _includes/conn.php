<?php
$dbuser = "omdcweb_giving";
$dbpass = "!+)+80+0CknT";
$dbname = "omdcweb_churchgiving";
$dbhost = "localhost";
require 'functions.php';
// Make Connection to Database
	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbname);

	// Check if connection was made
	if(! $conn) {
		die("Could not Connect:" . mysql_error());
	}
	mysql_select_db($dbname, $conn);

	