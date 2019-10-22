<?php
	require 'conn.php';
	
	$table = $_POST['table'];
	if ($table === 'offering') {
		$query = "SELECT o.offering_date, o.amount, m.first_name, m.last_name, f.fund, p.paytype, o.Ck_Num, m.member_id, o.offering_id, p.paytypeID, f.fundID from offering o inner join members m on o.member_id = m.member_id inner join paytype p on o.paytype = p.paytypeID inner join fund f on o.Fund = f.fundID order by o.offering_id DESC";
	}
	if ($table === 'member') {
		$query = "SELECT m.member_id, m.last_name, m.first_name, m.address, m.city, m.st, m.zip_code, f.spouse, f.child, f.child2, f.child3, f.child4, f.child5 FROM members m left join family f on m.member_id = f.family_id order by m.last_name";
	}
	if ($table === 'paytype') {
		$query = "SELECT * from paytype";
	}
	if ($table === 'fund') {
		$query = "SELECT * from fund";
	}
	createTable($conn, $query, $table);