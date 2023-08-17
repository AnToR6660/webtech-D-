<?php

require_once '../model/model.php';
$email = $_POST['email'];
$password = $_POST['password'];


$count=checkEmailandPass($conn,$email,$password);
//$Pass=checkPassword($conn,$password);

if($count==1)
{
    session_start();

    $uname=findUsername($conn,$email);
    $_SESSION['username']=$uname;
    header("Location:../view/UserProfile/UserProfile.php");
}
else if($count==3)
{
    session_start();

    $uname=findAdminName($conn,$email);
    $_SESSION['adminname']=$uname;
    header("Location:../view/adminProfile/adminProfile.php");

}


else if($count==2)
{
    echo"user not found";

}
     