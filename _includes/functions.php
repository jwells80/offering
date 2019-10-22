<?php

function selectPull($query, $conn, $table) {
	$output = '';
	$results = mysql_query($query, $conn);
	$row = mysql_fetch_array($results, MYSQL_ASSOC);
	$key = '';
	$value = '';
	do {
		if ($table === 'members') {
        	$key = $row['member_id'];
        	$value = "{$row['last_name']}, {$row['first_name']}";
		} elseif ($table === 'fund') {
			$key = $row['fundID'];
			$value = $row['fund'];
		} elseif ($table === 'paytype') {
			$key = $row['paytypeID'];
			$value = $row['paytype'];
		}

		$output .= '<option value="' . $key; 
		$output .= '">' . $value; 
		$output .= '</option>';
	}
	while ($row = mysql_fetch_array($results, MYSQL_ASSOC));
	echo $output;
	mysql_free_result($results);
	if (! $results) {
		die('Could not retreive data: '.mysql_error());
	}
	mysql_close($conn);
}
function createTable($conn, $query, $table) {
	$output = '';
	$results = mysql_query($query, $conn);
	$row = mysql_fetch_array($results, MYSQL_ASSOC);
	do {
		$output .= '<tr><td><div class="editbtn pretty small primary btn"><a href="#">Edit</a></div></td>
			<td><div class="deletebtn pretty small primary btn"><a href="#">Delete</a></div></td>';
		if ($table === 'offering') {
			$output .= "<td>{$row['offering_date']}</td><td>{$row['last_name']}, {$row['first_name']}</td>
				<td>{$row['amount']}</td><td>{$row['fund']}</td>
				<td>{$row['paytype']}</td><td>{$row['Ck_Num']}</td>";
			$output .= '<td class="hide">' . $row['offering_id'] . '</td><td class="hide">' 
				. $row['member_id'] . '</td><td class="hide">' . $row['fundID'] . '</td><td class="hide">' 
				. $row['paytypeID'] . '</td></tr>';
		}
		if ($table === 'member') {
			$output .= "<td>{$row['last_name']}, {$row['first_name']}</td><td>{$row['spouse']}</td>
				<td>{$row['address']}</td><td>{$row['city']}</td>
				<td>{$row['st']}</td><td>{$row['zip_code']}</td><td>";
			if (isset($row['child'])) {
				$output .= "{$row['child']}";
				if (isset($row['child2'])) {
					$output .= ", {$row['child2']}";
				}
				if (isset($row['child3'])) {
					$output .= ", {$row['child3']}";
				}
				if (isset($row['child4'])) {
					$output .= ", {$row['child4']}";
				}
				if (isset($row['child5'])) {
					$output .= ", {$row['child5']}";
				}
			}
			$output .= '</td><td class="hide">' . $row['member_id'] . '</td></tr>';
		}
		if ($table === 'paytype') {
			$output .= "<td>{$row['paytype']}</td>" . '<td class="hide">' . "{$row['paytypeID']}</td></tr>";
		}
		if ($table === 'fund') {
			$output .= "<td>{$row['fund']}</td>" . '<td class="hide">' . "{$row['fundID']}</td></tr>";
		}		
	}
	while ($row = mysql_fetch_array($results, MYSQL_ASSOC));
	echo $output;
	mysql_free_result($results);
	if (! $results) {
		die('Could not retreive data: '.mysql_error());
	}
	mysql_close($conn);
}
function editInfo($conn, $query) {
	$results = mysql_query($query, $conn);
	echo $results;
	echo $query;
	if (! $results) {
		die('Could not retreive data: '.mysql_error());
	}
	mysql_close($conn);
}
