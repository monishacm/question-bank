<?php

	$con = mysql_connect("localhost", "root", "111111");
	if ( ! $con) {
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("questions", $con);
	
	mysql_query('SET CHARACTER SET utf8');
	mysql_query("SET SESSION collation_connection ='utf8_general_ci'");
?>
