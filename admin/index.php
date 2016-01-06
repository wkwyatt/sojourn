<?php

	$connection = mysql_connect("localhost","cms-practice","x");
	if(!$connection) {
		die('Could not connect: '.mysql_error());
	}
	$db_selected = mysql_select_db('cms-practice', $connection);
	if(!$db_selected) {
		die('Cant use about: '.mysql_error());
	} else {
		// print "<pre>success!</pre>";
	}
	
	// var called query that is a string that queries the database
	$query = "SELECT * FROM about";
	// we now have a mysql object called result
	$result = mysql_query($query);
	if (!$result) {
		die(print "Query error: ".mysql_error());
	}
	// prints sql error if we have one;

	while($row = mysql_fetch_assoc($result)) {
		$rows[] = $row;
	}

	// print "<h1>Sometext".$rows."</h1>";
	// print "<script> 
	// 		var objects = ".json_encode($rows).";
	// 		console.log(objects);
	// 	   </script>";

?>





<!DOCTYPE html>
<html>
<head>
	<title>Sojourn Admin Page</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">

	<script>

	$(document).ready(function() {
		// $(".container").each(function(){
		// 	alert("container");
		// });
		updateTextArea($("#section").val());
		$("#section").change(function(){
			updateTextArea($(this).val());

			

		// 	var innerText = "";
		// 	// console.log(section);
		// 	for (var i = 0; i < objects.length; i++) {
		// 		if (objects[i].section == section) {
		// 			// console.log(objects[i].content);
		// 			innerText = objects[i].content;
		// 		};
		// 	};

		// 	$('#content').text(innerText);
		});	


	});
		
	function updateTextArea(section){
		var url = "http://local-sojourn.com/admin/admin_api.php?page=about&section="+section;
		console.log(url);
		$.getJSON(url, function(json, textStatus) {
			/*optional stuff to do after success */
			$('#content').val(json.content);
		});
	}

	</script>
</head>
<body>
	<div class="container">
		<h1><?php if ($_GET['result']) print $_GET['result']; ?></h1>
		<form action="http://local-sojourn.com/admin/admin_api.php" method="post">
			<div class="row">
				<div>
					<select id="section" class="form-control dropdown" name="section">
					<?php
						foreach($rows as $row){
							print '<option value="'.$row['section'].'">'.$row['section'].'</option>';
						}
					?>				
					 </select>				
				</div>
			</div>

			<div class="row B">
				<div class="form-group">
	  				<label for="comment">Enter Content</label>
	  				<textarea id="content" name="content" class="form-control" rows="7">
	  				</textarea>
				</div>
			</div>
			<button class="btn btn-primary btn-lg" type="submit">Submit</button>
		</form>
	</div>
</body>
</html>
