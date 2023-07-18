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
$nameErr= $unameErr= $emailErr = $genderErr = $passErr = $dateErr = $conpassErr= $bloodErr= "";
$name= $uname= $email = $gender = $comment = $pass = $date = $conpass= $blood= "";

$flag=1;
$found=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    //for name
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $flag=1;

  }elseif (str_word_count($_POST["name"])<2) 
  {
    $nameErr = "at least two words";
    $flag=1;


  }else {
    $name = test_input($_POST["name"]);
    $flag=$flag+1;


    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      $flag=1;

    }
  }



  //for password
  if (empty($_POST["password"])) 
  {
    $passErr = "password is required";
    $flag=1;
  }
  elseif(strlen($_POST["password"])<8) 
  {
    $passErr = "at least 8 character";
    $flag=1;
  }
  else 
  {
    $pass = test_input($_POST["password"]);
    $flag=$flag+1;
    
  }






  //confirm password
  if (empty($_POST["confirmpassword"])) 
  {
    $conpassErr = "confirm your password";
    $flag=1;
  }
  elseif(strcmp($_POST["confirmpassword"],$_POST["password"])==0) 
  {
      $conpass = test_input($_POST["confirmpassword"]);
      $flag=$flag+1;
  }
  else 
  {
    $conpassErr = "password didn't match";
    $flag=1;
  }















  //for email

  $data1 = file_get_contents("storage.json");  
  $data = json_decode($data1, true);

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $flag=1;
  }
  elseif (isset($data)) 
  {
      foreach($data as $row)
      {
          if($row['e-mail']==$_POST["email"])
          {   
             
              //echo $_POST["email"];
              //echo"<br>";
              $found=1;
          }
      }


      if ($found==1) 
      { 
          $emailErr="email exist";
          $flag=1;
      }
      else
      { 
          $email = test_input($_POST["email"]);
          $flag=$flag+1;


         // check if e-mail address is well-formed
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
         {
             $emailErr = "Invalid email format";
             $flag=1;
         }
       }
  }
  
  else
  { $email = test_input($_POST["email"]);
          $flag=$flag+1;


         // check if e-mail address is well-formed
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
         {
             $emailErr = "Invalid email format";
             $flag=1;
         }

  }



















  //for user name
  if (empty($_POST["uname"])) 
  {
    $unameErr = "Username is required";
    $flag=1;
  }else{
   $uname = test_input($_POST["uname"]);
  $flag=$flag+1;

  }


  //date of birth
  if (empty($_POST["dateofbirth"])) {
    $dateErr = "Date is required";
    $flag=1;
  }else
  {
   $date = test_input($_POST["dateofbirth"]);
   $flag=$flag+1;
  }

  //gender
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
    $flag=1;

  } 
  else 
  {
    $gender = test_input($_POST["gender"]);
    $flag=$flag+1;
  }

 
  }
  
 



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;

}
?>

<h2>Fill up the form to register</h2>
<p><span class="error">* required field</span></p>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <b>Name :</b>
  <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br><br>

  <b>E-mail :</b> 
  <input type="text" name="email" placeholder="anything@example.com" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br><br>

  <b>User Name :</b>
  <input type="text" name="uname" value="<?php echo $uname;?>">
  <span class="error">* <?php echo $unameErr;?></span>
  <br><br><br>


  <b>Password :</b>
  <input type="password" name="password" value="">
  <span class="error">* <?php echo $passErr;?></span>
  <br><br><br>
  
  <b>Confirm Password :</b>
  <input type="password" name="confirmpassword" value="">
  <span class="error">* <?php echo $conpassErr;?></span>
  <br><br><br>



  <b>Date Of Birth :</b> 
  <input type="date" name="dateofbirth" placeholder="dd/mm/yyyy" value="<?php echo $date;?>" min="1953-01-01" max="2024-12-31">
  <span class="error">* <?php echo $dateErr;?></span>
  <br><br><br>


  <b>Gender :</b><br>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br><br>

  <button type="submit">sign up</button>

</form>



<?php
if($flag==8)
{
 $message = '';  
 $error = ''; 


 if(file_exists('storage.json'))  
           {  
                $current_data = file_get_contents('storage.json');  
                $array_data = json_decode($current_data, true); 
                $new_data = array(  
                     'name'               =>     $_POST["name"],  
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["uname"],  
                     'gender'     =>     $_POST["gender"],  
                     'dateofbirth'     =>     $_POST["dateofbirth"],
                     'password'     =>     $_POST["password"],  
                     'confirmpassword'     =>     $_POST["confirmpassword"]  
                );  
                $array_data[] = $new_data;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('storage.json', $final_data))  
                {  
                     $message = "File Appended Success fully";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  

}
?>

<?php  
    if(isset($message))  
    {  
    echo $message;  
    }  
?>  

</body>
</html>

