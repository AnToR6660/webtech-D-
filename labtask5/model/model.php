<?php
require_once 'dbconn.php';



function addCustomer($conn,$name,$email,$uname,$password,$dateofbirth,$imagename,$uplod,$tmpname)
{

	 $sql = "INSERT INTO users (name, email, username, password, date_of_birth, image) 
            VALUES ('$name', '$email', '$uname', '$password', '$dateofbirth','$imagename')";

    if ($conn->query($sql) === TRUE) 
    {
        move_uploaded_file($tmpname,$uplod);
        //echo "Data inserted successfully!";
        return true;
    }
     else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
    
}


function checkEmailandPass($conn,$email,$password)
{
    $sql="SELECT * FROM users.admin";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0)
    {
        foreach($result as $row)
        {
            if($row['email'] == $email)
            {
                $count=3;

                $sql="SELECT * FROM users.admin";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0)
                {
                    foreach($result as $row)
                    {
                        if($row['password'] == $password)
                        {
                            $count=3;
                            break;
                        }else
                        {
                            $count=2;
                        }
                    }
                }
                
                break;

            }
            else
            {
                $count=2;
               
            }

        }
        

    }

    if ($count!= 3 )
    {
        $sql="SELECT * FROM users.users";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0)
        {
            foreach($result as $row)
            {
                if($row['email'] == $email)
                {
                    $count=1;
                    $sql="SELECT * FROM users.users";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        foreach($result as $row)
                        {
                            if($row['password'] == $password)
                            {
                                $count=1;
                                break;
                            }else
                            {
                                $count=2;
                            }
                        }
                    }

                    break;
                }else
                {
                    $count=2;
                }
            }
        }
    }
    return $count;

}



function findUsername($conn,$email)
{
    $sql="SELECT * FROM users.users";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0)
    {
        foreach($result as $row)
        {
            if($row['email'] == $email)
            {
                $uname=$row['username'];
                break;

            }

        }
        

    }
    return $uname;

}




function findAdminName($conn,$email)
{
    $sql="SELECT * FROM users.admin";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0)
    {
        foreach($result as $row)
        {
            if($row['email'] == $email)
            {
                $uname=$row['username'];
                break;

            }

        }
        

    }
    return $uname;

}


function addProduct($conn,$name,$price,$Pquantity,$imagename,$tmpname,$uplod,$category)
{
    $sql = "INSERT INTO users.inventory (name, price, quantity, image,category) 
            VALUES ('$name', '$price', '$Pquantity', '$imagename', '$category')";

    if ($conn->query($sql) === TRUE) 
    {
        move_uploaded_file($tmpname,$uplod);
        //echo "Data inserted successfully!";
        return true;
    }
     else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }


}

function addToCart($conn,$name,$price)
{
    
    $insertQuery = "INSERT INTO users.cart (product_name, price) 
                    VALUES ('$name', '$price')";
    if ($conn->query($insertQuery) === TRUE) {
        return 1;
    } else {
        return 0;
    }
    $conn->close();



}





?>

