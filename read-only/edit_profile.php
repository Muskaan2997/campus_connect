<?php
	$msg="";
	include("../setting.php");
	 include("../check_session_stu.php");
	if(isset($_POST["btnUpdate"]))
	{
		if(($_POST["txtName"]!=null)&& ($_POST["txtAddress"]!=null)&& ($_POST["txtCity"]!=null) 
			&& ($_POST["txtState"]!=null)&& ($_POST["txtCountry"]!=null)&& ($_POST["txtPhone"]!=null)&& ($_POST["txtEmailId"]!=null) 
		&&($_POST["Subject"]!=null))
		{
				
				$sql2=$mysqli->prepare("update userdetail set user_name=? , Address=? , City=? , State=? , country=? , Phone_no=? , email=? , languages_known=?, subject=? where user_id=?");
				$sql2->bind_param("sssssssssi",$_POST["txtName"],$_POST["txtAddress"],$_POST["txtCity"],$_POST["txtState"],$_POST["txtCountry"],$_POST["txtPhone"],$_POST["txtEmailId"],$_POST["txtLanguageKnown"],$_POST["Subject"],$_SESSION["UserId"]);
				$sql2->execute();
				$sql2->close();
				
				$msg="Records Updated";
			
		}
		else
		{
			$msg= "Please fill all the fields";
		}
	}
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
<?php
{
	
	?>
		<!-- Header -->
			<section id="header">
				<header>
					<span class="image avatar"><i class="fa fa-camera fa-lg"></i></span>
					<h1 id="logo"><a href="#"></a> <?php echo $row->user_name ?></h1>
					
					</p>
				</header>
				<nav id="nav">
					<ul>
						<li><a href="#one" class="active">About Me</a></li>
						<li><a href="change_password.php">Change Password</a></li>
						<li><a href="student_profile.php">Home</a></li>
						<li><a href="logout.php" >Logout</a></li>
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

								<div class="container">
									<header class="major">
	
	<table cellpadding="10" cellspacing="0" border="1" align="center">
        
				<form action ="" method="POST">
                <fieldset>
                	<legend align="center"> Personal Information </legend>
                 <table cellspacing="0">
                 	<tr>
                    	<td width="120">
                        	Name:
                        </td>
                        <td>
                        	<input type="text" name="txtName" title="Enter the Name" value=<?php echo $row->user_name ?> />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Address:
                        </td>
                        <td>
                       		<textarea rows="4" cols="16" name="txtAddress"  title="Enter the Address"></textarea> 	
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	City:
                        </td>
                        <td>
                        	<input type="text" name="txtCity"  title="Enter the City" />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	State:
                        </td>
                        <td>
                        	<input type="text" name="txtState"  title="Enter the State" />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Country:
                        </td>
                        <td>
                        	<input type="text" name="txtCountry"  title="Enter the Country" />
                        </td>
                    </tr>
                     <tr>
                    	<td>
                        	Phone:
                        </td>
                        <td>
                        	<input type="text" name="txtPhone" title="Enter the Phone Number" />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Email Id:
                        </td>
                        <td>
                        	<input type="text" name="txtEmailId" title="Enter the Email Id" value=<?php echo $row->email ?> />
                        </td>
                    </tr>
					<td>
                        	Languages Known
                        </td>
                        <td>
                        	<input type="text" name="txtLanguageKnown"  title="Enter the Languages you know" />
                        </td>
                    </tr>
						<tr>
									<td>
									    Write Your Subjects :
									</td>
									<td>
									<input type="text" name="Subject" placeholder="Enter your subjects">
								</td>
								</tr>
					
                     <tr>
                    	<td  align="center" colspan="2">
                        	<input type="submit" value="Update" name="btnUpdate"/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="reset" value="Reset" name="btnReset"/>
                        </td>
                    </tr>
                </table>   
                </fieldset>
            </td> 
        </tr>
    </table>

    </form>
							    <?php

}
?>
										

									</header>
									
								</div>
							</section>

						<!-- Two -->
						
						
						<!--	<section id="two">
								<div class="container">
									<h3>fchghk</h3>
									
								
						
								</div>		
                    	
							</section>

						
						

					
											</div>
										</div>
									</form>
								</div>
							</section>-->

						
						
					</div>

				

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