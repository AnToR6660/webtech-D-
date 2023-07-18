</head>
<body>  

<?php 

	session_start();
	if (isset($_SESSION['uname'])) 
    {
		

		
      $data1 = file_get_contents("admin.json");  
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
 <h2>WELCOME 
 <?php 

	$name="";
	$name=$_SESSION['uname'];
	echo $name;
 ?>
 </h2>
 <a href="profile.php">View profile</a><br>

<a href="sales.php">sales</a><br>
<a href="current_order.php">Current Order</a><br>
<a href="delivery.php">Delivery</a><br>
<a href="inventory.php">inventory</a>

<?php

if(!isset($_COOKIE["adminnamecookie"]))
{
    session_destroy();
}

?>


</body>
</html>