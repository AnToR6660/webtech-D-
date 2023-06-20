<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
  // define variables and set to empty values
  $nameErr= $passErr="";
  $name= $pass="" ;

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
 {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  }elseif (str_word_count($_POST["name"])<2) 
  {
	$nameErr = "at least two words";

  }else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  $returnpass=false;
  if (empty($_POST["password"])){
    $passErr = "password is required";
  }elseif(strlen($_POST["password"])<8){

    $passErr = "password must be more 8 in length";

  }elseif(strlen($_POST["password"])>8) 
  { $pass=$_POST["password"];
    for($i=0;$i<strlen($_POST["password"]);$i++)
    {
         if($pass[$i]=='@' || $pass[$i]=='$' || $pass[$i]=='#' ||$pass[$i]=='!'  )
         {  

                     
            $returnpass=true;
            break;


         }
     

    }

 }
  

  }








 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  
  }
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
<b>Name :</b>
  <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br><br>




<b>password :</b>
<input type="password" name ="password" value="<?php echo $pass;?>">  
<span class="error">* <?php echo $passErr;?></span>
<br><br><br>




  <input type="submit" name="submit" value="submit">
</form>


<?php
echo "<h2>your input</h2>";
echo $name;
echo"<br>";
echo $pass;

?>
</body>
</html>