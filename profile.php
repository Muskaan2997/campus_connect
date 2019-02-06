<?php
$msg="";
include("setting.php");
include("check_session.php");
$User_Id=$_SESSION["UserId"];
if(isset($_POST["btnUpdate"]))
{
  if (($_POST["txtUsername"]!=null)&& ($_POST["txtPassword"]!=null)&&($_POST["txtNPassword"]!=null)&& ($_POST["txtConfirmPassword"]!=null))
  {
    $sql=$mysqli->prepare("select password from userlogin where user_name=?");
	$sql->bind_param("s",$_SESSION["UserName"]);
	$sql->execute();
	$sql->bind_result($password);
	echo $password;
	if($sql->fetch()>0 && $_POST["txtPassword"]==$password)
	{
     if($_POST["txtNPassword"]==$_POST["txtConfirmPassword"])
	 {
		 $sql->close();
	 $sql=$mysqli->prepare("update userlogin set password=? where user_id=?");
	 $sql->bind_param("si",$_POST["txtNPassword"],$User_Id);
	 $sql->execute();
	 $sql->close();
	 $msg="changes done";
	 }
	 
	 else{
		 $msg="password don't match";
	 }
	}
	 
	 else{
		 
		 $msg="invalid username and password";
	 }
  }
	 else{
		 
		 $msg="fields kept empty";
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
						<h1><a href="">profile</a></h1>
						<nav class="links">
							<ul>
								<li><a href="#">EDIT</a></li>
								<li><a href="#login">CHANGE PASSWORD</a></li>
								<li><a href="#">logout</a></li>
								
								
							</ul>
						</nav>
						
							<nav class="main">
							<ul>
								<li class="menu">
									<a class="fa-bars" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
						
					</header>

				
				
				<!-- Menu -->
					<section id="menu">
						<section>
								<h1>settings</h1>
							</section>

						<!-- Links -->
							<section>
								<ul class="links">
									<li>
										<a href="#">
											<h3>Edit Profile</h3>
											
										</a>
									</li>
									<li>
										<a href="#login">
											<h3>Change Password</h3>
											
										</a>
									</li>
									
								</ul>
							</section>

						<!-- Actions -->
							<section>
								<ul class="actions stacked">
									<li><a href="logout.php" class="button large fit">Log out</a></li>
								</ul>
							</section>

					</section>
					<!------------------------------------------login---------------------------------------------------------------->
					
				<!-- login -->
					<section id="login">

						<!-- Search -->
							<section>
								
									<p>change password</P>
								
							</section>

						<!-- Links -->
							<section>
							<form action ="" method="POST">
								<ul class="links">
									
									<li>
										<input type="text" name="txtUsername" required title="Enter Name" readonly value
							="<?php echo $_SESSION['UserName']?> ">
									</li>
									
									<li>
										<input type="password" name="txtPassword" required title="Password" />
									</li>
									<li>
									<input type="password" name="txtNPassword" required title="Password" />
									</li>
								
								</ul>
								
							</section>

						<!-- Actions -->
							<section>
								<ul class="actions stacked">
								<li>
										<input type="submit" value="Update" name="btnUpdate"/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="reset" value="Reset" name="btnReset"/>
									</li>	
								</ul>
							</section>
                           </form>
					</section>
	
					
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>