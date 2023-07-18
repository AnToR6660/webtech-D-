<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>
 <?php 
 session_start();

 session_destroy();
  setcookie("namecookie",$_POST["uname1"],time()-86400);
  setcookie("passcookie",$_POST["password1"],time()-86400);
  setcookie("adminnamecookie",$_POST["uname1"],time()-86400);
  setcookie("adminpasscookie",$_POST["password1"],time()-86400);
 header("location:1stpage.php"); 
 ?>


</body>
</html>
