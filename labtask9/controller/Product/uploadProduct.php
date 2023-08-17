<?php

require_once '../../model/model.php';

$name = $_POST['Pname'];
$Pquantity = $_POST['Pquantity'];
$price = $_POST['price'];
$category = $_POST['category'];


$imagename=$_FILES['image']['name'];
$tmpname=$_FILES['image']['tmp_name'];
$uplod='../../data/product/'.$imagename;




if(addProduct($conn,$name,$price,$Pquantity,$imagename,$tmpname,$uplod,$category))
{
    header("location:../../view/adminProfile/UploadProduct.html");

}
else
{
    echo"did not upload";
}




?>