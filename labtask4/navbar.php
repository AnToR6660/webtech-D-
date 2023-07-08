<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>



 <h4 align="Right" >logged in as 
 <?php 
//session_start();
	$name="";
	$name=$_SESSION['uname'];
	echo $name;

 ?><a href="logout.php"> Log Out</a></h4>


</body>
</html>
