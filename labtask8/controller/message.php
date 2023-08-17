<?php 
  
  require_once '../model/model.php';

  
  $count= $name= $email= $uname= $password= $confirmpassword=$dateofbirth="";
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $uname = $_POST['uname'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $dateofbirth = $_POST['dateofbirth'];
        $imagename=$_FILES['image']['name'];
        $tmpname=$_FILES['image']['tmp_name'];
        $uplod='userPhoto/'.$imagename;
      
        
        
        
        if (addCustomer($conn,$name,$email,$uname,$password,$dateofbirth,$imagename,$uplod,$tmpname)) 
        {
          session_start();
          $_SESSION['count']=1;
            header("location:../view/registered.php");
            
        }else
        {
           $count=0;
        }
        
        
        
        
?>
<?php 
		require 'navbar.php';
?>
