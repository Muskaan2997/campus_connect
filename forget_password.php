<?php
include("setting.php");
include "classes/class.phpmailer.php"; // include the class name
if(isset($_POST["submit"]))
{
	if( ($_POST['email']!=null))
	{
    $sql=$mysqli->prepare("select email from userdetail where email=?");
	$sql->bind_param("s",$_POST["email"]);
	$sql->execute();
	$sql->bind_result($email);
	$sql->fetch();
	$sql->close();
	
	}
	if($_POST["email"]==$email)
	{
	$sql=$mysqli->prepare("select user_name from userlogin where user_name=?");
	$sql->bind_param("s",$_POST["uname"]);
	$sql->execute();
	
	$sql->bind_result($username);
	$sql->fetch();
	$sql->close();
	if($_POST["uname"]==$username)
		
	{
			$sql=$mysqli->prepare("select password from userlogin where user_name=?"); 
	        $sql->bind_param("s",$_POST["uname"]);
			$sql->execute();
			$sql->bind_result($password);
			$sql->fetch();
			echo "CHECK YOUR MAIL";
	      
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
$mail->Subject = "Your Gmail SMTP Mail";
$mail->Body = "<b>Your password is ". $password;


$mail->AddAddress($_POST["email"]);		//mail address of sender

if(!$mail->Send())
{
	echo "Mailer Error: " . $mail->ErrorInfo;
}
}
else
{
	$msg="USERNAME DOESNOT EXIST";
}
	}
else
{
 $msg="EMAIL DOESNOT EXIST";	
}
	}


?>











<html>
<head></head>

<body>
<form action ="" method="POST">
<input type = "text" name ="uname" placeholder ="enter your unique username"> 
<input type = "email" name ="email" placeholder ="enter your mail here">
<input type = "submit" name ="submit" value="submit">
</form>
</body>
</html>