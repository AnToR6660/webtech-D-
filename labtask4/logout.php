<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>
 <?php 
 session_start();

 session_destroy();
 header("location:1stpage.php"); 
 ?>


</body>
</html>
