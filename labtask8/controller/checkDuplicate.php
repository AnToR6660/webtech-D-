<?php
require_once '../model/dbconn.php';
if(isset($_POST['check_emailbtn']))
{


    $email=$_POST['email'];
    $checkemail="SELECT email FROM users WHERE email='$email' ";
    $checkemail_run=mysqli_query($conn,$checkemail);

    if (mysqli_num_rows($checkemail_run) > 0)
    {
        echo "this mail is already taken";


    }
    else
    {
        echo"available";

    }
}



?>