<?php

	$connection = mysql_connect("127.0.0.1", "phpland", "x");

	if (!$connection) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db('phpland', $connection);
	if (!$db_selected) {
		die ('Can\'t use phpland : ' . mysql_error());
	}

	$query = "SELECT * FROM about"; 
	//we have a var called query from our query 
	$result = mysql_query($query);
	//we now have a mysql object call result
	print mysql_error();

	while ($row =mysql_fetch_assoc($result)) {
		$section = $row["section"];
		$rows[$section] = $row['content'];
	}


	// print "<pre>";
	// print_r ($rows);
	// print "</pre>";
	$header_content = $rows['header'];
	$location_content = $rows['location'];
	$acct_content = $rows['acct'];
	$pricing_content = $rows['pricing'];

	$descText = "Our lives take us on many journeys; with our careers, families, sports teams, schools, etc...  At Sojourn, our desire is to provide a safe and fun environment to Sojourn from these life journeys for a brief period of time in order to reflect, gain new insight, and enter back into our journeys with new perspective.";

	

?>

<html>
<head>
	<title>Sojourn</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="social-media-icons" class="container">
		<span>Feedback</span>
		<img src="http://q.b5z.net/zirw/h495b/i/t/w/integration/social/icons/fcc1/ig_32x32.png" border="0">
		<img src="http://q.b5z.net/zirw/h495b/i/t/w/integration/social/icons/fcc1/fb_32x32.png" border="0">
		<img src="http://q.b5z.net/zirw/h495b/i/t/w/integration/social/icons/fcc1/tw_32x32.png" border="0">
		<span><a href="#">Prepare for Your Adventure</a></span>
	</div>
	<nav class="navbar navbar-default">
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
							<p><?php print $header_content ?></p>
					</div>
					<div class="col-sm-3">
						<a href="http://www.myfoxatlanta.com/story/22039997/church-ropes-course-is-leap-of-faith"target="blank"><img src="images/Fox_5_Video_of_Sojourn.png" width="200" height="100"></a>
					</div>
				</div>
				<div class="row location">
					<div class="col-sm-9">
						<?php print $location_content ?>
					</div>
						<div class="col-sm-3">
							<img src="images/Get_Directions_to_Ropes_Course_Button.png">
						</div>
				</div>
				<div class="row ACCT-Membership">
					<div class="col-sm-9">
						
						<?php print $acct_content ?>
					</div>
						<div class="col-sm-3">
							<img src="images/ACCT_Logo_Button.png">
						</div>
				</div>
				<div class="row pricing">
					<div class="col-sm-12">
						
						<?php print $pricing_content ?>
					</div>
				</div>	
			
			</div> <!-- left content div ends -->
			<div class="right-content col-sm-2">
				<img src="images/Get_a_Quote.png">
				<img src="images/Photo_Gallery_Button.png">
				<img src="images/video_tour_button.png">
				<img src="images/Prepare_for_Your_Event_Sidebar_Button.png">
			</div><!-- right content ends -->
				
		</div> <!-- content-wrapper -->
	</div> <!-- container -->
	<footer>
		<div id="footer-content">
			<ul>
				<li>9500 Medlock Bridge Rd.</li>
				<li>Johns Creek, GA 30097</li>
				<li>Phone: 678.405.2106</li>
				<li>Email: sojourn@perimerter.org</li>
			</ul>	
			<img id="acct-img" alt="Association for Challenge Course Technology" src="http://q.b5z.net/i/u/10099375/i/acct_logo_footer.png">
			<div id="footer-right">
				<img id="staff-login-img" alt="Ropes Course Staff Login" src="http://q.b5z.net/i/u/10099375/i/staff_login_button_footer.png">
				<span>Designed by DigitalCraft Students</span>
			</div>
		</div>
	</footer>


</body>
</html>


