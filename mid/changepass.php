<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
body
      {
            background-image: url('z6.jpg');
            background-repeat: no-repeat;
            background-attachment:fixed;
            background-position:bottom;
      }
      



</style>
</head>
<body>

<?php
session_start();
if (isset($_SESSION['uname']))
{
$username= $email= $matchErr="";
$change=0;
//if ($_SERVER["REQUEST_METHOD"] == "POST")
if(!empty($_POST["oldpass"]))
{
	if(!empty($_POST["newpass"]) && !empty($_POST["conpass"]))

   {
     if($_POST["newpass"] == $_POST["conpass"])
     {

	

       $data1 = file_get_contents("storage.json");  
       $data = json_decode($data1, true);
       if (isset($data)) 
       {
          foreach($data as &$row)
          {
              if($row['password']==$_POST['oldpass'])
              {
                  
                   $change=1;
                   $row['password']=$_POST["newpass"];
                   $row['confirmpassword']=$_POST["conpass"];
                   $data1=json_encode($data);
                   file_put_contents("storage.json",$data1);
                   break;
              
              }
          }



          if($change==0)
          {
              $matchErr="password incorrect";
          }
        
       }
     }else
     {
         $matchErr="re-enter password";
     }
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
<h4>Change Password</h4>
<b>Current Password :</b>
  <input type="password" name="oldpass" value="">
  <span class="error">* <?php echo $matchErr;?></span>
  <br><br><br>

<b>new password :</b>
  <input type="password" name="newpass" value="">
  <br><br><br>

<b>confirm new password :</b>
 <input type="password" name="conpass" value="">
  <span class="error">* <?php echo $matchErr;?></span>
 <br><br><br>
 

<br><button type="submit">Submit</button>
<?php

if($change==1)
{
	echo "changed successfull";
	echo "<br>";
}

?>



</form>
</body>
</html>