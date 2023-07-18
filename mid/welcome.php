<!DOCTYPE HTML>  
<html>
<head>

<style>
 body
      {
            background-image: url('z3.jpg');
            background-repeat: no-repeat;
            background-attachment:fixed;
            background-position:center;
      }
      
</style>

</head>
<body style="text-align: center;">  

<?php 

	session_start();
	if (isset($_SESSION['uname'])) 
    {
		

		
      $data1 = file_get_contents("storage.json");  
      $data = json_decode($data1, true);
      if (isset($data)) 
      {
          foreach($data as $row)
          {
              if($row['username']==$_SESSION['uname'])
              {
                  
                   $flag=1;
                   $_SESSION['email']=$row['e-mail'];
                   $_SESSION['gender']=$row['gender'];
                   $_SESSION['dob']=$row['dateofbirth'];
                   break;
              
              }else
              {
                  $flag=0;
              }
          }
          if($flag==0)
          {
              echo"user not found";
          }
      }
	}else
    {
		header("location:login.php");
	}
   
 ?>



 



 <?php 
		require 'navbar.php';
?>
 <h2 style="display: inline-block; padding: 10px 20px; background-color: orange; color: white; text-decoration: none; border-radius: 5px;">WELCOME 
 <?php 

	$name="";
	$name=$_SESSION['uname'];
	echo $name;
 ?>
 </h2>
 <br>
 <h3 align= "left"><a href="profile.php" style="display: inline-block; padding: 10px 20px; background-color: black; color: white; text-decoration: none; border-radius: 5px;">View Profile</a></h3><br>
  <h3 align= "left"><a href="shop.php" style="display: inline-block; padding: 10px 20px; background-color: black; color: white; text-decoration: none; border-radius: 5px;">START SHOPPING</a></h3><br>
  <h3 align= "left"><a href="ordersandreordering.php" style="display: inline-block; padding: 10px 20px; background-color: black; color: white; text-decoration: none; border-radius: 5px;">Orders and Reordering </a></h3><br>
  <h3 align= "left"><a href="giftcard.php" style="display: inline-block; padding: 10px 20px; background-color: black; color: white; text-decoration: none; border-radius: 5px;">Gift Card </a></h3><br>
 


<?php

if(!isset($_COOKIE["namecookie"]))
{
    session_destroy();
}

?>


</body>
</html>


