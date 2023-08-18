<?php

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    require_once '../../model/model.php';
    $name = $_POST["name"];
    $price = $_POST["price"];

    $count=addToCart($conn,$name,$price);
    if($count==1)
    {
        echo"item added";

    }
    elseif($count==0)
    {
        echo"item is not added";
    }


}




?>