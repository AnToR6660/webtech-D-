<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
session_start();
$uname1 = $unameErr1= $password1= $passErr1= "";
$flag= 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") 

{
 if (empty($_POST["uname1"])) 
  {
    $unameErr1 = "Username is required";
  }else if(empty($_POST["password1"]))
  {
      $passErr1="Password is required";
  }
  else
  {
      $data1 = file_get_contents("storage.json");  
      $data = json_decode($data1, true);
      if (isset($data)) 
      {
          foreach($data as $row)
          {
              if($row['username']==$_POST["uname1"] && $row['password']==$_POST["password1"])
              {
                   $flag=1;
                   break;
              
              }else
              {
                  $flag=0;
              }
          }

          if($flag==1)
          {
              echo "user found";
              $_SESSION['uname'] = $_POST["uname1"];
              header("location:welcome.php");          }
          if($flag==0)
          {
              echo"user not found";
          }

      
      
      }
   
  }
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<b>User Name :</b>
  <input type="text" name="uname1" value="<?php echo $uname1;?>">
  <span class="error">* <?php echo $unameErr1;?></span>
  <br><br><br>

<b>Password :</b>
  <input type="password" name="password1" value="">
  <span class="error">* <?php echo $passErr1;?></span>
  <br><br><br>


<button type="submit">login</button> <a href="forgotpass.php">Forgot passsword?</a>


</form>
</body>
</html>
