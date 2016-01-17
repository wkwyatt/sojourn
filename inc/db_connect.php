<?php

	session_start();

	$link = mysqli_connect('127.0.0.1', 'cms-practice', 'x');
	if (!$link) {
	    die('Not connected : ' . mysqli_error());
	}
	// make phpland the current db
	$db_selected = mysqli_select_db($link, 'cms-practice');
	if (!$db_selected) {
	    die ('Can\'t use phpland : ' . mysqli_error());
	}

?>