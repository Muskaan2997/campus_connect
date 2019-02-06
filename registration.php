<?php
$msg="";
include("setting.php");
//include("check_session.php");
if(isset($_POST["btnregister"]))
{
  if (($_POST["txtUserNameR"]!=null)&& ($_POST["txtpasswordR"]!=null)&& ($_POST["txtCpasswordR"]!=null)
 && ($_POST["txtUserTypeR"]!=null) &&  ($_POST["emailR"]!=null))
  
  {
  
     if($_POST["txtpasswordR"]==$_POST["txtCpasswordR"])
	 {
	 
	 
	 $sql1=$mysqli->prepare("select count(*) from userlogin where user_name =?");
	 $sql1->bind_param("s",$_POST["txtUserNameR"]);
	 $sql1->execute();
	 $sql1->fetch();
	 $sql1->bind_result($check);
	 $sql1->close();
	 
	 if($check==0)
	 { 
	 $sql=$mysqli->prepare("insert into userlogin(user_name,password,user_type)values(?,?,?)");
	 $sql->bind_param("sss",$_POST["txtUserNameR"],$_POST["txtpasswordR"],$_POST["txtUserTypeR"]);
	 $sql->execute();
	 $sql->close();
	 
	 $sql=$mysqli->prepare("select max(user_id) from userlogin");
	 $sql->execute();
	 $sql->bind_result($id);
	 $sql->fetch();
	 $sql->close();
	 
	 $sql=$mysqli->prepare("insert into userdetail (user_id,user_name,email)
	 values(?,?,?)");
	 $sql->bind_param("iss",$id,$_POST["txtUserNameR"],$_POST["emailR"]);
	 $sql->execute();
	 $sql->close();
	 $msg="Record inserted Successfully";
	 }

else
{
     $msg="user already exists";
}
}

else{
    $msg="password don't match";
}
}

else{
    $msg="fields cannot be left empty ";
}
}
echo "<script>alert ('wait for approval a mail will be send to you ');</script>";
header("location:index.php");
?>


