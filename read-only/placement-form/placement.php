<?php
	$msg="";
	include("../../setting.php");
	 include("../../check_session_stu.php");
	if(isset($_POST["btnUpdate"]))
	{
		if(($_POST["txtName"]!=null)&& ($_POST["txtAddress"]!=null)&& ($_POST["txt10cgpa"]!=null) 
			&& ($_POST["txt12cgpa"]!=null)&& ($_POST["txtClgcgpa"]!=null)&& ($_POST["txtPhone"]!=null)&& ($_POST["txtEmailId"]!=null) 
		&&($_POST["txtLanguageKnown"]!=null))
		{
				
				$sql=$mysqli->prepare("insert into placement(user_name,Address,10_cgpa,12_cgpa,current_cgpa,phone_no,email,language)values(?,?,?,?,?,?,?,?)");
	 $sql->bind_param("ssssssss",$_POST["txtName"],$_POST["txtAddress"],$_POST["txt10cgpa"],$_POST["txt12cgpa"],$_POST["txtClgcgpa"],$_POST["txtPhone"],$_POST["txtEmailId"],$_POST["txtLanguageKnown"]);
	 $sql->execute();
	 $sql->close();
				
				$msg="Records Updated";
			
		}
		else
		{
			$msg= "Please fill all the fields";
		}
	}
	?>









<!DOCTYPE HTML>

<html>
	<head>
		<title>Form</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="bootstrap.min.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<section id="header">
				<header>
					
				
				
					<a href="#banner" class="button style2 scrolly-middle">FORM</a>
				</header>
			</section>

		<!-- Banner -->
			<section id="banner col-md-6">
				
				
				<div class="container">
									<header class="major">
	
	<table cellpadding="" cellspacing="0" border="1" align="center">
        
				<form action ="" method="POST">
                <fieldset>
                	
                 <table cellspacing="0" >
                 	<tr>
                    
                        <td>
                        	<input type="text" class="form-control" name="txtName" placeholder="First Name"  />
                        </td>
                    </tr>
                    <tr>
                    	
                        <td>
                       		<input type="text" class="form-control" name="txtAddress"  placeholder="Enter the Address">
                        </td>
                    </tr>
                    <tr>
                    	
                        <td>
                        	<input type="text" class="form-control" name="txt10cgpa" placeholder="enter 10th percentage cgpa" />
                        </td>
                    </tr>
                    <tr>
                    	
                        <td>
                        	<input type="text" class="form-control" name="txt12cgpa"  placeholder="enter 12th percentage or cgpa" />
                        </td>
                    </tr>
                    <tr>
                    	
                        <td>
                        	<input type="text" class="form-control" name="txtClgcgpa"  placeholder="enter current percentage or cgpa" />
                        </td>
                    </tr>
                     <tr>
                    	
                        <td>
                        	<input type="text" class="form-control" name="txtPhone" placeholder="Enter the Phone Number" />
                        </td>
                    </tr>
                    <tr>
                    	
                        <td>
                        	<input type="text" class="form-control" name="txtEmailId" placeholder="Enter the Email Id" />
                        </td>
                    </tr>
					
                        <td>
                        	<input type="text" class="form-control" name="txtLanguageKnown" placeholder="Enter the Languages you know" />
                        </td>
                    </tr>
					
                     <tr>
                    	<td  align="center" colspan="2">
                        	<input type="submit" class=" btn-info" value="Submit" name="btnUpdate"/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="reset" class=" btn btn-danger" value="Reset" name="btnReset"/>
                        </td>
                    </tr>
                </table>   
                </fieldset>
            </td> 
        </tr>
    </table>
			</section>

		
		<section id="footer">
			<ul class="icons">
				<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
				<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
				<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
				<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
			</ul>
			
		</section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>