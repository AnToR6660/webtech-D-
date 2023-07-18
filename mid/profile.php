<!DOCTYPE HTML>  
<html>
<head>
<style>
 body
      {
            background-image: url('z4.jpg');
            background-repeat: no-repeat;
            background-attachment:fixed;
            background-position:center;
      }
      
</style>


</head>
<body>



<?php 
$name= $email= $gender= $dob="";
$flag=0;

session_start();

if(isset($_SESSION['uname']) && $_SESSION['uname']=='ramim' ){

      $data1 = file_get_contents("admin.json");  
      $data = json_decode($data1, true);
      if (isset($data)) 
      {
          foreach($data as $row)
          {
              if($row['username']==$_SESSION['uname'])
              {
                   $flag=1;
                   $name=$row['username'];
                   $email=$row['e-mail'];
                   $gender=$row['gender'];
                   $dob=$row['dateofbirth'];
                   break;
              
              }
          }
      }



}



elseif (isset($_SESSION['uname']) && $_SESSION['uname']!='ramim'){



      $data1 = file_get_contents("storage.json");  
      $data = json_decode($data1, true);
      if (isset($data)) 
      {
          foreach($data as $row)
          {
              if($row['username']==$_SESSION['uname'])
              {
                   $flag=1;
                   $name=$row['username'];
                   $email=$row['e-mail'];
                   $gender=$row['gender'];
                   $dob=$row['dateofbirth'];
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
<h2>Profile</h2>
<h4>Name : <?php echo $name; ?></h4>
<h4>Email : <?php echo $email; ?></h4>
<h4>Gender : <?php echo $gender; ?></h4>
<h4>Date of birth : <?php echo $dob; ?></h4>

<a href="editprofile.php">Edit Profile</a><br>
<a href="changepass.php">Change Password</a><br>



<?php
if(isset($_COOKIE["namecookie"]) || isset($_COOKIE["adminnamecookie"]))
{
    $c=1;
}else{
session_destroy();
}
?>

</body>
</html>
