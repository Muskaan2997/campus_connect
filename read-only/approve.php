<?php
$msg="";
include("../setting.php");
include("../check_session.php");
include ("../classes/class.phpmailer.php");
$id=$_GET['id'];


	
	if(isset($_POST["approve"]))
	{
	 
	 $sql=$mysqli->prepare("update userdetail set status=? where user_id=?");
	 $sql->bind_param("si",$_POST["status_approve"],$id);
	 $sql->execute();
	 $sql->close();
	 $msg="Record inserted Successfully";
	
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; // or 587
$mail->IsHTML(true);
$mail->Username ="muskaanthakur2997@gmail.com";
$mail->Password = "muskaan@9882134637";
$mail->SetFrom("muskaanthakur2997@gmail.com");
$mail->Subject = "Your ACCOUNT APPROVAL mail";
$mail->Body = "<b>You may log in now .
Username for the account is ". $_POST["txtName"].
" Password for the account :".$_POST["txtPassword"];


$mail->AddAddress($_POST["txtEmailId"]);		//mail address of sender

if(!$mail->Send())
{
	echo "Mailer Error: " . $mail->ErrorInfo;
}

echo "<script>alert ('Data has been entered and mail has been sent');</script>";
	header("location:teacher_profile.php");
	}
	 
	 else if (isset($_POST["reject"]))
	 {
		  $sql=$mysqli->prepare("insert into rejected_users(user_name,user_type,email,password)values(?,?,?,?)");
	 $sql->bind_param("ssss",$_POST["txtName"],$_POST["txtUsertype"],$_POST["txtEmailId"],$_POST["txtPassword"]);
	 $sql->execute();
	 $sql->close();
	 $msg="Record inserted Successfully";
		 
			$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; // or 587
$mail->IsHTML(true);
$mail->Username ="vs601819@gmail.com";
$mail->Password = "vishal97sharma";
$mail->SetFrom("vs601819@gmail.com");
$mail->Subject = "Your ACCOUNT REJECTION mail";
$mail->Body = "<b>you have to register yourself again.";


$mail->AddAddress($_POST["txtEmailId"]);		//mail address of sender

if(!$mail->Send())
{
	echo "Mailer Error: " . $mail->ErrorInfo;
} 
	 }

$sql="select * from userlogin inner join userdetail on userlogin.user_id=userdetail.user_id where userlogin.user_id=$id"; //concatenation
	$result=mysqli_query($mysqli,$sql);
	$row=mysqli_fetch_object($result);
	//header("location:teacher_profile.php");
	
  
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>My Profile</title>
</head>
<body>
	<table cellpadding="10" cellspacing="0" border="1" align="center">
    	<tr>
        	<td align="center">
            	<h1> Approval for <?php echo $row-> user_type ?> login</h1>
				
            </td>
        </tr>
		<form action="" method="POST">
        
        <tr>
        	<td>
            	<fieldset>
                	<legend align="center"> Account Information</legend>
                 <table cellspacing="0">
                 	<tr>
                    	<td width="120">
                        	UserType:
                        </td>
                        <td>
                        	<input type="text" name="txtUsertype" required title="Enter Name" readonly value
							="<?php echo $row->user_type ?> "/>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Password:
                        </td>
                        <td>
                        	<input type="text" name="txtPassword" required title="Password" readonly value
							="<?php echo $row->password ?>" />
                        </td>
                    </tr>
                   
                 
                 	<tr>
                    	<td width="120">
                        	Name:
                        </td>
                        <td>
                        	<input type="text" name="txtName" required title="Enter Name" readonly  value
							="<?php echo $row->user_name ?>"/>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Email Id:
                        </td>
                        <td>
                        	<input type="text" name="txtEmailId" required title="Enter Email" readonly value
							="<?php echo $row->email?>" />
                        </td>
                    </tr>
					<tr>
                    	
                        <td>
                        	<input type="hidden" name="status_approve" value="approved">
							
                        </td>
                    </tr>
					
                     <tr>
                    	<td  align="center" colspan="2"><br>
                        	<input type="submit" value="Approve" name="approve"/>
                           &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" value="Reject" name="reject"/>
                        </td>
                    </tr>
                </table>   
                </fieldset>
            </td> 
        </tr>
		</form>
    </table>
</body>
</html>
