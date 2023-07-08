<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>

<?php
session_start();
if (isset($_SESSION['uname'])){

$username= $email="";
$change=0;
//if ($_SERVER["REQUEST_METHOD"] == "POST")
if(!empty($_POST["uname1"]))
{
	if(!empty($_POST["email"]))

 {
	

      $data1 = file_get_contents("storage.json");  
      $data = json_decode($data1, true);
      if (isset($data)) 
      {
          foreach($data as &$row)
          {
              if($row['username']==$_SESSION['uname'])
              {
                  
                   
                   $row['e-mail']=$_POST["email"];
                   $row['username']=$_POST["uname1"];
                   $data1=json_encode($data);
                   file_put_contents("storage.json",$data1);
                   $_SESSION['uname']=$_POST["uname1"];
                   $_SESSION['email']=$_POST["email"];
                   break;
              
              }
              
          }
        
      }
      

  $change=1;
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

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h4>Edit Profile</h4>
<b>User Name :</b>
  <input type="text" name="uname1" value="<?php echo $username;?>">
  <br><br><br>

<b>Email :</b>
  <input type="text" name="email" value="<?php echo $email;?>">
  <br><br><br>


<button type="submit">Submit</button>
<?php

if($change==1)
{
	echo "changed successfull";
	echo "<br>";
}

?>

<a href="welcome.php">go back to welcome page </a>


</form>
</body>
</html>