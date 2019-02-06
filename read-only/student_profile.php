<?php
	$msg="";
	include("../setting.php");
    include("../check_session_stu.php");

	$sql="select * from userlogin inner join userdetail on userlogin.user_id=userdetail.user_id where userlogin.user_id=".$_SESSION["UserId"]; //concatenation
	$result=mysqli_query($mysqli,$sql);
	$row=mysqli_fetch_object($result);
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>PROFILE</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<section id="header">
				<header>
					<span class="image avatar"><i class="fa fa-camera fa-lg"></i></span>
					<h1 id="logo"><a href="#"><?php echo $row->user_name ?></a></h1>
					<p>I am a software engineer<br />
					</p>
				</header>
				<nav id="nav">
					<ul>
						<li><a href="#one" class="active">About Me</a></li>
						<li><a href="#two">Education </a></li>
						<li><a href="#three">Languages Known</a></li>
						<li><a href="#four">Contact</a></li>
						<li><a href="placement-form/placement.php">Apply for Placement</a></li>
						<li><a href="edit_profile.php">Edit Profile</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</nav>
				<footer>
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
					</ul>
				</footer>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">

						<!-- One -->
							<section id="one">
								<div class="image main" data-position="center">
				<!---header img-->					
				<img src="images/banner.jpg" alt="" />
								</div>
								<div class="container">
									<header class="major">
										<h2>Introduction </h2>
										<p>Hi everyone! I am <?php echo $row->user_name ?> <br>I belong to a very beautiful place ,a place known for it's beauty i.e. <?php echo $row->City ?>.<br />
										<a href="http://html5up.net"></a></p>
									</header>
									<p>I am a people person.I like interacting with people because I learn something new from everyone.Everyone should believe in being optimistic and have a positive mind<br> that's what i believe.
									   </p>
									   <h4> Email Address : "<?php echo $row->email ?>" </h4>
									   <h4> MY CONTACT NUMBER :"<?php echo $row->Phone_no ?>"</h4>
								</div>
							</section>

						<!-- Two -->
							<section id="two">
								<div class="container">
									<h3>My Education Qualification</h3>
									<p></p>
									<ul class="feature-icons">
										<!--<li class="fa-code">Write all the code</li>
										<li class="fa-cubes">Stack small boxes</li>
										<li class="fa-book">Read books and stuff</li>
										<li class="fa-coffee">Drink much coffee</li>
										<li class="fa-bolt">Lightning bolt</li>
										<li class="fa-users">Shadow clone technique</li>
									--></ul>
								</div>
							</section>

						<!-- Three -->
							<section id="three">
								<div class="container">
									<h3>LANGUAGES KNOWN</h3>
									<p>These are the languages I am familiar with.</p>
									<div class="features">
										
										<h5><?php echo $row->languages_known ?></h5>
									
									</div>
								</div>
							</section>

						<!-- Four -->
							<section id="four">
								<div class="container">
									<h3>FEEDBACK</h3>
									<p>U are welcome to share you thoughts.</p>
									<form method="post" action="feedback.php">
										<div class="row gtr-uniform">
											<div class="col-6 col-12-xsmall"><input type="text" name="name" id="name" placeholder="Name" /></div>
											<div class="col-6 col-12-xsmall"><input type="email" name="email" id="email" placeholder="Email" /></div>
											<div class="col-12"><input type="text" name="subject" id="subject" placeholder="Subject" /></div>
											<div class="col-12"><textarea name="message" id="message" placeholder="Message" rows="6"></textarea></div>
											<div class="col-12">
												<ul class="actions">
													<li><input type="submit" class="primary" value="Feedback" /></li>
													
												</ul>
											</div>
										</div>
									</form>
								</div>
							</section>



					</div>

				<!-- Footer -->
					

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>