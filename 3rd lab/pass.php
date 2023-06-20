<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
<?php
$nameErr= $passErr1= $passErr2="";
$name= $pass1= $pass2="";
//current password

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    if (empty($_POST["name"])){
        $nameErr = "password is required";
      }elseif(strlen($_POST["name"])<8){
    
        $nameErr = "password must be more 8 in length";
    
      }elseif(strlen($_POST["name"])>8) 
      {
        $name=$_POST["name"];
        for($i=0;$i<strlen($_POST["name"]);$i++)
        {
             if($name[$i]=='@' || $name[$i]=='$' || $name[$i]=='#' ||$name[$i]=='!'  )
             {  
    
                         
                $returnpass=true;
                break;
    
    
             }
         
    
        }
    
     }

    
    
    if (empty($_POST["password"]))
    {
        $passErr1 = "password is required";
    }elseif(strlen($_POST["password"])<8)
    {
    
        $passErr1 = "password must be more 8 in length";
    
    }
      elseif(strlen($_POST["password"])>8) 
      {
        
        $pass1=$_POST["password"];
        for($i=0;$i<strlen($_POST["password"]);$i++)
        {
             if($pass1[$i]=='@' || $pass1[$i]=='$' || $pass1[$i]=='#' ||$pass1[$i]=='!'  )
             {  
    
                         
                $returnpass1=true;
                break;
    
    
             }
         
    
        }
      }
    
     

    if (empty($_POST["password1"]))
    {
        $passErr2 = "password is required";
    }else if(strcmp($_POST["password"],$_POST["password1"])==0){
        $pass2="changed";


    }else $passErr2="didnt match ";




}





?>




<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

<b>current password :</b>
  <input type="password" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br><br>




<b> new password :</b>
<input type="password" name ="password" value="<?php echo $pass1;?>">  
<span class="error">* <?php echo $passErr1;?></span>
<br><br><br>


<b> retype password :</b>
<input type="password" name ="password1" value="<?php echo $pass2;?>">  
<span class="error">* <?php echo $passErr2;?></span>
<br><br><br>

<input type="submit" name="submit" value="submit">
</form>
<?php
echo $name;
echo "<br>";

echo $pass1;
echo "<br>";

echo $pass2;
echo "<br>";

?>



</body>
</html>