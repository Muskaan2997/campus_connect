<?php
	$msg="";
	include("../setting.php");
	include("../check_session.php");
	if(isset($_POST["btnSearch"]))
	{
		$text=$_POST["txtSearch"];
		$sql=$mysqli->prepare("select userlogin.user_id,userdetail.user_name,userlogin.user_type,userdetail.email,
		userdetail.phone_no from userlogin inner join userdetail on userlogin.user_id=userdetail.user_id where user_name like ?");
		$text='%'.$text.'%';
		$sql->bind_param("s",$text);
	}
	else
	{	
		$sql=$mysqli->prepare("select userlogin.user_id,userdetail.user_name,userlogin.user_type,userdetail.email,
		userdetail.phone_no from userlogin inner join userdetail on userlogin.user_id=userdetail.user_id");
		$sql->execute();
		$result=$sql->get_result();
	}
	$sql->execute();
	$result=$sql->get_result();
	

	
	 
	
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
					
					<h1 id="logo"><a href="#">ADMIN</a></h1>
					<p>I am a software engineer<br />
					</p>
				</header>
				<nav id="nav">
					<ul>
						<li><a href="#one" class="active"> details</a></li>
						<li><a href="edit_profile.php">EDIT</a></li>
					<li><a href="logout.php">Logout</a></li>

						<li><a href="edit_profile.php">Notifications</a></li>
						<li><a href="edit_profile.php">Edit Profile</a></li>
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
										<h2> DETAILS </h2>
										
									</header>
							


            <tr>
            	<td>
                	<form method="post" action="">
                	<table cellpadding="" cellspacing="0">
                    	<tr>
                            <td width="500">
                         <input type="text" name="txtSearch" placeholder="Search Here" style="width: 400px;";/> <br><input type="submit" value="Search"  name="btnSearch"/>
                            </td>
                        </tr>
                    </table>
                    </form>
                </td>
            </tr>
            <td>
            	<table border="1" align="center" cellpadding="15" cellspacing="0">
                    <tr>
                        <td>
                            User Id
                        </td>
                        <td>
                            Name
                        </td>
                        <td>
                            Type
                        </td>
                        <td>
                            Email
                        </td>
                        <td>
                            Phone
                        </td>
                        <td>
                            Option
                        </td>
                    </tr>
     		 <?php
	                while($row=$result->fetch_object())
					{
				?>
                    <tr>
                    	<td align="center">
                        	<?php echo $row->user_id ?> 
                        </td>
                        <td>
                        	<?php echo $row->user_name ?>
                        </td>
                        <td>
                        	<?php echo $row->user_type ?>
                        </td>
                        <td>
                        	<?php echo $row->email ?>
                        </td>
                        <td>
                        	<?php echo $row->phone_no ?> 
                        </td>
                        <td>
                        	<a href="approve.php?id=<?php echo $row->user_id ?>"  title="APPROVE/DECLINE" name="lnkEditProfile">APPROVE/DECLINE</a>		<!--query string-->
                        </td>
                    <?php
							}
    					?>
                    </tr>
                </table>
            </td>
        </table>     
    </form>	

								</div>
							</section>

						<!-- Two -->
						<!--	<section id="two">
								<div class="container">
									<h3></h3>
									<p></p>
									<ul class="feature-icons">
										<li class="fa-code">Write all the code</li>
										<li class="fa-cubes">Stack small boxes</li>
										<li class="fa-book">Read books and stuff</li>
										<li class="fa-coffee">Drink much coffee</li>
										<li class="fa-bolt">Lightning bolt</li>
										<li class="fa-users">Shadow clone technique</li>
									</ul>
								</div>
							</section>

						<!-- Three -->
						<!--	<section id="three">
								<div class="container">
									<h3>LANGUAGES KNOWN</h3>
									<p>These are the languages I am familiar with.</p>
									<div class="features">
										
										<h5><?php echo $row->languages_known ?></h5>
									
									</div>
								</div>
							</section>

						<!-- Four -->
						<!--	<section id="four">
								<div class="container">
									<h3>FEEDBACK</h3>
									<p>U are welcome to share you thoughts.</p>
									<form method="post" action="#">
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
					<section id="footer">
						<div class="container">
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</section>

			</div>
<!--- image--->
			
		
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