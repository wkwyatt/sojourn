<?php
	include 'inc/db_connect.php';
	if(!isset($_SESSION['username'])){
		//Goodbye.
		header('Location: http://local-phpland.com/');
		exit;
	}
	$query = "SELECT * FROM about";
	$result = mysql_query('SELECT * FROM about');
	while ($row = mysql_fetch_assoc($result)) { 
		$rows[] = $row;
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<script type="text/javascript">
	$(document).ready(function(){
		$('.form-control').change(function(){
			var content = $(this).val();
			var url = 'http://local-phpland.com/admin_api.php?page=about&section='+content;
			console.log(url);
			$.getJSON(url, function(result){
				$('#content').val(result.content);
			});
		});
	});
</script>

<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Collapsible Group 1</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
      commodo consequat.</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        Collapsible Group 2</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
      commodo consequat.</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        Collapsible Group 3</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
      commodo consequat.</div>
    </div>
  </div>
</div>


	<div class="container">
		<div class="row">
			<div class="dropdown">
<!-- 				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Select Area
					<span class="caret"></span>
				</button> -->
				<select class="form-control" name="">
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
  				<textarea class="form-control" rows="7" id="content"></textarea>
				</div>
		</div>
		<button class="btn btn-lg" type="submit">Submit</button>
	</div>

</body>
</html>