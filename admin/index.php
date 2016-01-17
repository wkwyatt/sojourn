<?php

	include '../inc/db_connect.php';

	if (!isset($_SESSION['username'])) {
		header('location:  ../');
		exit;
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
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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

	function logout(){
	}

	</script>
	<style>
		.delete-sections {
			width: 150px;
			display: inline-block;
			margin-top: 15px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1><?php print "Welcome ".$_SESSION['username']; ?></h1>
		<h1><?php if ($_GET['result']) print $_GET['result']; ?></h1>
			  <!-- <p><strong>Note:</strong> The <strong>data-parent</strong> attribute makes sure that all collapsible elements under the specified parent will be closed when one of the collapsible item is shown.</p> -->
			  <div class="panel-group" id="accordion">
			    <div class="panel panel-default">
			      <div class="panel-heading">
			        <h4 class="panel-title">
			          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Add new Section</a>
			        </h4>
			      </div>
			      <div id="collapse1" class="panel-collapse collapse in">
			        <div class="panel-body">
			        	<form action="http://local-sojourn.com/admin/admin_api.php" method="post">
							<div class="row">
								<div class="dropdown">
									<input class="form-control" id="add-section" type="text" name="section" value="" placeholder="Please enter the section name...">			
								</div>
							</div>

							<div class="row B">
								<div class="form-group">
					  				<label for="comment">Enter Content</label>
					  				<textarea id="add-content" name="content" class="form-control" rows="7">
					  				</textarea>
								</div>
							</div>
							<input type="hidden" name="crud_task" value="addNew">
							<button class="btn btn-primary btn-lg" type="submit">Submit</button>
						</form>
			        </div>
			      </div>
			    </div>
			    <div class="panel panel-default">
			      <div class="panel-heading">
			        <h4 class="panel-title">
			          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Update Section</a>
			        </h4>
			      </div>
			      <div id="collapse2" class="panel-collapse collapse">
			        <div class="panel-body">
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
							<input type="hidden" name="crud_task" value="update">
							<button class="btn btn-primary btn-lg" type="submit">Submit</button>
						</form>
			        </div>
			      </div>
			    </div>
			    <div class="panel panel-default">
			      <div class="panel-heading">
			        <h4 class="panel-title">
			          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Upload File</a>
			        </h4>
			      </div>
			      <div id="collapse3" class="panel-collapse collapse">
			        <div class="panel-body">
			        	<form action="admin_api.php" method="post" enctype="multipart/form-data">
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
									Select image to upload
					  				<input type="file" name="fileToUpload" id="fileToUpload">
								</div>
							</div>
							<input type="hidden" name="crud_task" value="upload">
							<button class="btn btn-primary btn-lg" type="submit">Submit</button>
						</form>
			        </div>
			      </div>
			    </div>
			    <div class="panel panel-default">
			      <div class="panel-heading">
			        <h4 class="panel-title">
			          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Delete Section</a>
			        </h4>
			      </div>
			      <div id="collapse4" class="panel-collapse collapse">
			        <div class="panel-body">
			        	<!-- <form action="http://local-sojourn.com/admin/admin_api.php" method="post"> -->
			        	<?php foreach($rows as $row): ?>
			        		<div>
			        			<span class="delete-sections"><?php print $row['section']; ?></span>
			        			<!-- <input type="hidden" name="crud_task" value="delete"> -->
			        			<a href="http://local-sojourn.com/admin/admin_api.php?id=<?php print $row['id'];?>&crud_task=delete"><button class="btn btn-danger">Delete</button></a>
			        		</div>
			        	<?php endforeach; ?>
			        	<!-- </form> -->
			        </div>
			      </div>
			    </div>
			  </div> 
			<a href="../index.php?logout=true">Logout</a>

		
	</div>
</body>
</html>
