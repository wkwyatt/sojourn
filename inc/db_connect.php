<?php

	session_start();

	$link = mysql_connect('127.0.0.1', 'cms-practice', 'x');
	if (!$link) {
	    die('Not connected : ' . mysql_error());
	}
	// make phpland the current db
	$db_selected = mysql_select_db('cms-practice', $link);
	if (!$db_selected) {
	    die ('Can\'t use phpland : ' . mysql_error());
	}

?>