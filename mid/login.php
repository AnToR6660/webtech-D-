<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}


      body
      {
            background-image: url('z2.jpg');
            background-repeat: no-repeat;
            background-attachment:fixed;
            background-position:center;
      }
      
      
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
  }
  if(empty($_POST["password1"]))
  {
      $passErr1="Password is required";
  }
  if(!empty($_POST["uname1"]) && !empty($_POST["password1"]) )
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
                  $flag=2;
              }
          }
      }



      if($flag==1)
      {
              $_SESSION['uname'] = $_POST["uname1"];

              if(isset($_POST["remember"]))
              {
              setcookie("namecookie",$_POST["uname1"],time()+86400);
              setcookie("passcookie",$_POST["password1"],time()+86400);

              }
              header("location:welcome.php");
      }

      if($flag==2)
      {
              $admindata1 = file_get_contents("admin.json");  
              $admindata = json_decode($admindata1, true);
              if (isset($admindata)) 
              {
                 foreach($admindata as $row)
                 {
                     if($row['username']==$_POST["uname1"] && $row['password']==$_POST["password1"])
                     {
                       $flag=3;
                       break;
              
                     }else
                     {
                        $flag=4;
                     }
                 }
              }


              if ($flag==3)
              {
                  $_SESSION['uname'] = $_POST["uname1"];

                  if(isset($_POST["remember"]))
                  {
                   setcookie("adminnamecookie",$_POST["uname1"],time()+86400);
                   setcookie("adminpasscookie",$_POST["password1"],time()+86400);
                  }
                  header("location:welcomeadmin.php");


              
              
              
              }if($flag==4)
              {
                   echo"user not found";

              }
         
      }

  }
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<b>User Name :</b>
  <input type="text" name="uname1" value="<?php if(isset($_COOKIE["namecookie"])) {echo $_COOKIE["namecookie"];}
                                               else if(isset($_COOKIE["adminnamecookie"])){echo $_COOKIE["adminnamecookie"];}?>">
  <span class="error">* <?php echo $unameErr1;?></span>
  <br><br><br>

<b>Password :</b>
  <input type="password" name="password1" value="<?php if(isset($_COOKIE["passcookie"])) {echo $_COOKIE["passcookie"];} 
                                                      else if(isset($_COOKIE["adminpasscookie"])){echo $_COOKIE["adminpasscookie"];}?>">
  <span class="error">* <?php echo $passErr1;?></span>
  <br><br><br>


<input type="checkbox" name="remember"> <label for="remember">Remember Me</label>
<br><br>


<button type="submit">login</button> <a href="forgotpass.php">Forgot passsword?</a>


</form>
</body>
</html>
