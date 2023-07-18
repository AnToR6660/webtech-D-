<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>

<?php 
$email= "";
$flaf=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	 $data1 = file_get_contents("storage.json");  
     $data = json_decode($data1, true);
     if (isset($data)) 
      {
          foreach($data as $row)
          {
              if($row['e-mail']==$_POST["email"])
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
          }
          if($flag==0)
          {
              echo"user not found";
          }
      }
}
?>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<b>Enter email :</b>
  <input type="text" name="email" value="<?php echo $email;?>">
  <br><br><br>



<button type="submit">submit</button>


</form>
</body>
</html>

