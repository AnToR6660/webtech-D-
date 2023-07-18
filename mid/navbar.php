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

 ?><br><a href="logout.php"> Log Out</a><br><br><a href="cart.php"> Cart</a></h4>



</body>
</html>
