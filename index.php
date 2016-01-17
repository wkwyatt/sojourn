<?php 
	include 'inc/db_connect.php';
	
	if($_GET['logout'] == 'true') {
		session_destroy();
	}
	// var called query that is a string that queries the database
	$query = "SELECT * FROM about";
	// we now have a mysql object called result
	$result = mysql_query($query);
	print mysql_error();
	// prints sql error if we have one;

	while($row = mysql_fetch_assoc($result)) {
		// Formats the result
		// print "<pre>";
		// print_r($rows);
		// print "</pre>";
		$section = $row["section"];
		$rows[$section] = $row['content'];
	}

	// print "<pre>";
	// print_r($rows);
	// print "</pre>";

	// $header_text = $rows[0]['content'];
	// $header_text = $rows[0]['content'];
	// $header_text = $rows[0]['content'];
	// $header_text = $rows[0]['content'];

	// // var called query that is a string that queries the database
	// $query = "SELECT * FROM about WHERE section = 'header' ";
	// // we now have a mysql object called result
	// $result = mysql_query($query);
	// print mysql_error();
	// // prints sql error if we have one;


	// $row = mysql_fetch_assoc($result);
	// $header_text = $row['content'];

	// // var called query that is a string that queries the database
	// $query = "SELECT * FROM about WHERE section = 'location' ";
	// // we now have a mysql object called result
	// $result = mysql_query($query);
	// print mysql_error();
	// // prints sql error if we have one;

	// $row = mysql_fetch_assoc($result);
	// $location_text = $row['content'];

	// // var called query that is a string that queries the database
	// $query = "SELECT * FROM about WHERE section = 'location' ";
	// // we now have a mysql object called result
	// $result = mysql_query($query);
	// print mysql_error();
	// // prints sql error if we have one;

	// $row = mysql_fetch_assoc($result);
	// $acct_text = $row['content'];

	// // var called query that is a string that queries the database
	// $query = "SELECT * FROM about WHERE section = 'location' ";
	// // we now have a mysql object called result
	// $result = mysql_query($query);
	// print mysql_error();
	// // prints sql error if we have one;

	// $row = mysql_fetch_assoc($result);
	// $pricing_text = $row['content'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sojourn Adventures</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href='https://fonts.googleapis.com/css?family=Ubuntu|Oswald' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="social-media-icons" class="container">
		<span>Feedback</span>
		<img src="<?php print $rows['sn-icon-tw'] ?>" border="0">
		<img src="<?php print $rows['sn-icon-fb'] ?>" border="0">
		<img src="<?php print $rows['sn-icon-ig'] ?>" border="0">
		<span><a href="#">Prepare for Your Adventure</a></span>
	</div>
	<nav id="main-nav" class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">
					<img alt="Brand" src="images/sojourn_logo_header.png">
				</a>
				<ul class="nav navbar-nav">
					<li ><a href="#">Home</a></li>
					<li class="active"><a href="#">About Us</a></li>
					<li><a href="#">Programs</a></li> 
					<li><a href="#">Leadership</a></li> 
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Contact Us
							<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">FAQ</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	<div class="container">
		<div class="content-wrapper">
			<div class="left-content col-sm-10">
				<h2><img src="images/tico1.png">About Sojourn</h2>
				<div class="row main-callout">
					<img src="images/About_Sojourn_Header.jpg">
				</div>
					<div class="row description">
						<div class="col-sm-9">
							<p><?php print $rows['header'] ?></p>
						</div>
						<div class="col-sm-3">
							<a href="http://www.myfoxatlanta.com/story/22039997/church-ropes-course-is-leap-of-faith" target="blank"><img src="images/Fox_5_Video_of_Sojourn.png" width="200" height="100"></a>
						</div>
					</div>
						<div class="row location">
							<div class="col-sm-9">
								<h2>Location</h2>
								<p><?php print $rows['location'] ?></p>
							</div>
							<div class="col-sm-3">
								<img src="images/Get_Directions_to_Ropes_Course_Button.png">
							</div>
						</div>
						<div class="row ACCT-Membership">
							<div class="col-sm-9">
								<h2>ACCT Membership</h2>
								<p><?php print $rows['acct'] ?></p>
							</div>
							<div class="col-sm-3">
								<img src="images/ACCT_Logo_Button.png">
							</div>
						</div>
						<div class="row pricing">
							<div class="col-sm-12">
								<h2>Pricing</h2>
								<p><?php print $rows['pricing'] ?></p>
							</div>
						</div>

					</div>
			<!-- left content div ends next -->
				</div>

				<div class="right-content col-sm-2">
					<img src="images/Get_a_Quote.png">
					<img src="images/Photo_Gallery_Button.png">
					<img src="images/video_tour_button.png">
					<img src="images/Prepare_for_Your_Event_Sidebar_Button.png">
				</div>
				<!-- right content ends above -->
		</div>
	</div>
	<footer>
		<div id="footer-content">
			<ul>
				<li><?php print $rows['footer-street'] ?></li>
				<li><?php print $rows['footer-city'] ?></li>
				<li>Phone: <?php print $rows['footer-phone'] ?></li>
				<li>Email: <?php print $rows['footer-email'] ?></li>
			</ul>	
			<img id="acct-img" alt="Association for Challenge Course Technology" src="http://q.b5z.net/i/u/10099375/i/acct_logo_footer.png">
			<img id="staff-login-img" alt="Ropes Course Staff Login" src="http://q.b5z.net/i/u/10099375/i/staff_login_button_footer.png">
			<div id="footer-right">
				<span>Designed by DigitalCraft Students</span>
			</div>
		</div>
	</footer>


	</body>
	</html>