<?php   
   include("setting.php");
   $msg="";
   if(isset($_POST["btnlogin"]))
   {
   	if(trim($_POST["txtUserName"])!=null && trim($_POST["txtpassword"])!=null)
   {
	   $sql=$mysqli->prepare("select status from userdetail where user_name=?");
	   $sql->bind_param("s",$_POST["txtUserName"]);
	   $sql->execute();
	   $sql->bind_result($status);
	   $sql->fetch();
	   $sql->close();

   
   
   if($status=="approved")
   {
      $sql1=$mysqli->prepare("select * from userlogin where user_name=?");
      $sql1->bind_param("s",$_POST["txtUserName"]);
      $sql1->execute();
      $sql1->bind_result($User_Id,$User_Name,$Password,$User_Type);
       if($sql1->fetch()>0 && $_POST["txtpassword"]==$Password)
     {
		 echo$_POST["txtpassword"];
     	$_SESSION["UserId"]=$User_Id;
     	$_SESSION["UserName"]=$User_Name;
     	$_SESSION["UserType"]=$User_Type;
     	  if(strToLower($User_Type)=="admin")
     	  {
     	  	header("location:".baseurl()."read-only/teacher_profile.php");
     	  }
		 else if(strTOLower($User_Type)=="student")
		  {
			  header("location:".baseurl()."read-only/student_profile.php");
		  }
		   else 
		  {
			  header("location:".baseurl()."read-only/teacher_profile1.php");
		  }
	 }
	 
    else
    {
		//echo "<span style="color:red; "Invalid Username or Password";
echo "<script>alert ('Wrong value entered');</script>";
	
		}
   }
   else{
	   echo"<script>alert ('Wait for the approval, your request is still pending');</script>";
	  //	header("location:index.php");
	  	
   }
   }
else
{
	$msg="Enter UserName and Password";
}
}
   
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>buest connect-profile</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.html">HOME</a></h1>
						<nav class="links">
							<ul>
								<li><a href="#login">LOGIN</a></li>
								<li><a href="#menu">REGISTRATION</a></li>
								<li><a href="gallary2/placement.html">PLACEMENTS</a></li>
								
								<li><a href="gallary2/gallary1.html">GALLERY</a></li>
								
							</ul>
						</nav>
						
					</header>

				<!-- Menu -->
					<section id="menu">

						<!-- Search -->
							<section>
								
									<p>REGISTER HERE</P>
								
							</section>

						<!-- Links -->
							<section>
							<form action ="registration.php" method ="POST">
								<ul class="links">
									<li>
										<input type="text" name="txtUserNameR" placeholder="FULL NAME" required /> 
											
									</li>
									<li>
										<input type="email" name="emailR" placeholder="EMAIL ADDRESS" required /> 
									</li>
									<li>
										<input type="password" name="txtpasswordR" placeholder="PASSWORD" required /> 
									</li>
									<li>
										<input type="password" name="txtCpasswordR" placeholder="CONFIRM PASSWORD" required /> 
									</li>
									<li>
										<select name="txtUserTypeR"> 
										<option>--CATAGORIES--</option>
										
							            <option value="teacher">Faculty</option>
										<option value="student">Student</option>
										</select>
									</li>
								</ul>
							</section>

						<!-- Actions -->
							<section>
								<ul class="actions stacked">
								<li>
										<input type="submit" name="btnregister" value="SUBMIT"/> 
									</li>	
								</ul>
							</section>
							</form>

					</section>
					<!------------------------------------------login---------------------------------------------------------------->
					
				<!-- login -->
					<section id="login">

						<!-- Search -->
							<section>
								
									<p>LOGIN HERE</P>
								
							</section>

						<!-- Links -->
							<section>
							<form action ="" method="POST">
								<ul class="links">
									
									<li>
										<input type="text" name="txtUserName" placeholder="User Name" required /> 
									</li> 
					          <!--  <li>
										<select name="txtUserType" required> 
										<option>--CATAGORIES--</option>
										<option value="admin">Admin</option>
							            <option value="teacher">Faculty</option>
										<option value="student">Student</option>
										</select>
									</li>--->
									<li>
										<input type="password" name="txtpassword" placeholder="PASSWORD" required /> 
									     <a href="forget_password.php"> forget password </a>
									</li>
									
								
								</ul>
								<?php echo $msg;?>
							</section>

						<!-- Actions -->
							<section>
								<ul class="actions stacked">
								<li>
										<input type="submit" name="btnlogin" value="login"/> 
									</li>	
								</ul>
							</section>
                           </form>
					</section>
	
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					

			
				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
								
									<div class="title">
									<title> OUR INSTITUTES</title>
										<h2><a href="seet.html">School of Engineering & Emerging Technologies (SEET)</a></h2>
										
									</div>
									<div class="meta">
									
									<span class="name"> SEET BLOCK</span><img src="http://www.baddiuniv.ac.in/wp-content/uploads/2018/06/BUSET-SMS.jpg" id="seet">
									</div>
								</header>
								<a href="or.html" class="image featured"><!--<img src="http://www.baddiuniv.ac.in/wp-content/uploads/2018/06/BUSET-SMS.jpg" alt="" />--></a>
<!----------------------------------------------------slider----------------------------------------------------->								
								<div class="slider" id="main-slider"><!-- outermost container element -->
									<div class="slider-wrapper"><!-- innermost wrapper element -->
										<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpTrNjWkbAoatzDab3VqXm2h_qC2gBWC2d6qq34ZnI9jZLfJ6l" alt="First" class="slide" /><!-- slides -->
										<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUvJ3vlWvo-O_p-5N4zjBS8-26o7tSOzQbbJxQYF_P9iwomtO2" alt="Second" class="slide" />
										<img src="https://www.collegebatch.com/static/clg-gallery/baddi-university-of-emerging-sciences-technologies-buest-baddi-102917.jpg" alt="Third" class="slide" />
									</div>
								</div>	
								<!---------------------------------------slideshow------------------>
								<p>School of Engineering & Emerging Technologies earlier famous with the name Institute of Engineering & Emerging Technologies (IEET) was established in the year 2002 by a society named Center for Advanced Studies in Engineering (CASE), with a deep commitment to promote and propagate quality technical education.
										The School has been offering following under graduate, post graduate & Doctoral courses.</p>
								<footer>
									<ul class="actions">
										<li><a href="seet.html" class="button large">Continue Reading</a></li>
									</ul>
									
									
								</footer>
							</article>

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="spes.html">School of Pharmacy and Emerging Sciences (SPES)</a></h2>
										
									</div>
									<div class="meta">
									<span class="name">SPES BLOCK</span><img src="https://content3.jdmagicbox.com/comp/solan/i6/9999p1792.1792.110116085147.t5i6/catalogue/baddi-university-of-emerging-sciences-and-technology-baddi-solan-colleges-312t42x.jpg" id="pharma">
									</div>
								</header>
								
								<p>School of Pharmacy & Emerging Sciences (SPES) was established in 2007 to provide quality education, training and carry out research in Pharmaceutical Sciences. SPES has state of art infrastructure for training students on drug discovery, drug development, production, quality control of drugs and pharmaceuticals.</p>
								<footer>
									<ul class="actions">
										<li><a href="spes.html" class="button large">Continue Reading</a></li>
									</ul>
								
								</footer>
							</article>

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="sms.html">School of Management Studies (SMS)</a></h2>
										
									</div>
									<div class="meta">
										
										<span class="name">SMS BLOCK</span><img src="http://www.baddiuniv.ac.in/wp-content/uploads/2018/04/BUSET-SMSS.jpg" id="sms" /></a>
									</div>
								</header>
								<a href="sms.html" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
								<p>The School of Management Studies (SMS) holds a vision of shaping leaders for the exigent corporate houses the world over. It transfers a very clear perception of becoming an academically responsive to the necessities of the corporate.</p>
								<footer>
									<ul class="actions">
										<li><a href="single.html" class="button large">Continue Reading</a></li>
									</ul>
									
								</footer>
							</article>

							<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="sos.html">School of Sciences(SOS)</a></h2>
										
									</div>
									<div class="meta">
										
										<span class="name">SOS BLOCK</span><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_LwgST17fSWxYrxuzCaVn6Q6XblSaTYZY8JT_WJlBbTAkCoJB" id="sos" /></a>
									</div>
								</header>
								<a href="sos.html" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
								<p>The School of Sciences strives to impart excellent quality education in the areas of Mathematics, Physics, Chemistry and Humanities for the future technocrats.</p>
								<footer>
									<ul class="actions">
										<li><a href="single.html" class="button large">Continue Reading</a></li>
									</ul>
									
								</footer>
							</article>

			<!---csdv ---
					
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Elements</a></h2>
										<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-10-18">October 18, 2015</time>
										<a href="#" class="author"><span class="name">Jane Doe</span><img src="images/avatar.jpg" alt="" /></a>
									</div>
								</header> -->

							
							
								
								

											<section id="three">
						<h2>Get In Touch</h2>
						<div class="row">
							<div class="col-8 col-12-small">
								<form method="post" action="#">
									<div class="row gtr-uniform gtr-50">
										<div class="col-6 col-12-xsmall"><input type="text" name="name" id="name" placeholder="Name" /></div>
										<div class="col-6 col-12-xsmall"><input type="email" name="email" id="email" placeholder="Email" /></div>
										<div class="col-12"><textarea name="message" id="message" placeholder="Message" rows="4"></textarea></div>
									</div>
								</form>
								<ul class="actions">
									<li><input type="submit" value="Send Message" /></li>
								</ul>
							</div>
							<div class="col-4 col-12-small">
								<ul class="labeled-icons">
									<li>
										<h3 class="icon fa-home"><span class="label">Address</span></h3>
										 Baddi University of Emerging Sci. & Tech. Makhnumajra,<br />
										 Baddi, <br />
										Distt. Solan, H.P.-173205
									</li>
									<li>
										<h3 class="icon fa-mobile"><span class="label">Phone</span></h3>
										Telephone: 01795-247353
									</li>
									
								</ul>
							</div>
						</div>
					</section>

								

							</article>
					

						<!-- Pagination -->
							

					</div>

				<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								<header>
									<!--<h2>BUEST</h2>
									<p>LEARN TO EXCEL! </p>-->
						<img src="logo.jpg" id="logo">	
									</header>
							</section>

						<!-- Mini Posts -->
							<section>
								<div class="mini-posts">

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="single.html" class="fa fa-eye">Our Vision</a></h3>

												<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
											</header>
											<a href="single.html" class="image"><img src="images/pic04.jpg" alt="" /></a>
										</article>

									<!-- Mini Post -->
										<article class="mini-post">
											<header>
												<h3><a href="mission.html" class="fa fa-rocket">Our Mission</a></h3>
												<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
											</header>
											<a href="mission.html" class="image"><img src="images/pic05.jpg" alt="" /></a>
										</article>

									

			

								</div>
							</section>
				<section id="footer">
							
								<ul class="icons">
									<li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
									<li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
								</ul>
								<!--<p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
							--></section>

					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>