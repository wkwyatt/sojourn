<?php

	include '../inc/db_connect.php';
	if (isset($_POST['email'])){

		$hashed_password = md5($_POST['password']."thisisalittlesalt");

		$query = "SELECT * FROM users 
			WHERE email = '".$_POST['email']."' 
			AND password = '".$_POST['password']."' 
			AND accessLevel = 1";

		$result = mysqli_query($link, $query);
		if(mysqli_num_rows($result) == 1){
			// user exist and is logged in
			$_SESSION['username'] = $_POST['email'];
			header('location:  index.php');
		} else {
			// wrong info
			header('location:  login.php?login=failed');
		}
	}

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
		updateTextArea($("#section").val());
		$("#section").change(function(){
			updateTextArea($(this).val());
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
	<style>
		h1 {text-align: center;}
		#form-signin {
			max-width: 450px;
			text-align: center;
			margin: auto;
		}
		#form-signin * { margin-top: 15px; }
		#form-signin a { display: block; }
	</style>
</head>
<body>
	<div class="container">
		<h1>LOGIN ADMIN</h1>
		<form id="form-signin" action="login.php" method="post">
			<div class="row">
				<input id="inputEmail" class="form-control" type="email" name="email" value="" placeholder="Email Address...">
			</div>
			<div class="row B">
				<input id="inputPassword" class="form-control" type="password" name="password" value="" placeholder="Password">
			</div>
  					<?php 
  						if(isset($_GET['login'])) { 
  							print "<div class='alert alert-danger' role='alert'>Username or Password is incorrect </div>"; 
  						}
  					?>
			<a href="#">Forgot Password?</a>
			<input type="checkbox" name="remember">Remember Me<br />
			<button class="btn btn-primary btn-lg" type="submit">Login</button>
		</form>
	</div>
</body>
</html>
