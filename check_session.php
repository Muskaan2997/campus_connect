<?php
   if (!isset($_SESSION['UserId']))
 {
  header('location:../setting.php');
 }

   if(!isset($_SESSION['UserType'])||$_SESSION['UserType']!='admin')

  {
  header('location:../setting.php');
  }

?>