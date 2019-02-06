<?php
$msg="";
include("../setting.php");
//include("../check_session_stu.php");
$User_Id=$_SESSION["UserId"];
if(isset($_POST["btnUpdate"]))
{
  if (($_POST["txtUsername"]!=null)&& ($_POST["password"]!=null)&&($_POST["newpassword"]!=null)&& ($_POST["confirmpassword"]!=null))
  {
    $sql=$mysqli->prepare("select password from accepted_users where user_name=?");
	$sql->bind_param("s",$_SESSION["UserName"]);
	$sql->execute();
	$sql->bind_result($password);
	echo $password;
	if($sql->fetch()>0 && $_POST["password"]==$password)
	{
     if($_POST["newpassword"]==$_POST["confirmpassword"])
	 {
		 $sql->close();
	 $sql=$mysqli->prepare("update accepted_users set password=? where user_id=?");
	 $sql->bind_param("si",$_POST["newpassword"],$User_Id);
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
	$sql="select * from accepted_users where user_id=".$_SESSION["UserId"]; //concatenation
	$result=mysqli_query($mysqli,$sql);
	$row=mysqli_fetch_object($result);
	 
	 
  ?>
	 



<!DOCTYPE HTML>
<html>
	<head>
		<title>PROFILE</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main1.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<section id="header">
				<header>
					<span class="image avatar"><img src="" alt="" /></span>
					<!-- <h1 id="logo"><a href="#"></a> <?php echo $row->user_name ?></h1> -->
					
					</p>
				</header>
				<nav id="nav">
					<ul>
						<li><a href="#one" class="active">Change Password</a></li>
						<li><a href="student_profile.php" class="active">Home</a></li>
						
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
		
								</div>
								<div class="container">
									<header class="major">
	
	<table cellpadding="10" cellspacing="0" border="1" align="center">
        
				<form action ="" method="POST" align="center">
                <fieldset>
                <legend align="center">Change Password </legend>
                 <table cellspacing="0">
                 	<tr>
					<td>
					<input type="text" name="txtUsername" required title="Enter Name" readonly value
							="<?php echo $_SESSION['UserName']?> ">
					</td>
					</tr>
					
					<tr>
                    	
                        <td>
                        	<input type="password" name="password" placeholder="Enter your old password"  />
                        </td>
                    </tr>
                  
                    <tr>
                    	
                        <td>
                        	<input type="password" name="newpassword"  placeholder="Enter New Password" />
                        </td>
                    </tr>
                   <tr>
                    	
                        <td>
                        	<input type="password" name="confirmpassword"  placeholder="Confirm Password" />
                        </td>
                    </tr>
                    	<td  align="center" colspan="2">
                        	<input type="submit" value="Update" name="btnUpdate"/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="reset" value="Reset" name="btnReset"/>
                        </td>
                    </tr>
                </table>   
                </fieldset>
				</form>
            </td> 
        </tr>
    </table>

   
	

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