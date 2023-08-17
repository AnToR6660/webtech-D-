<?php

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $name=$_POST["product_name"];
    $price=$_POST["product_price"];
    $id=$_POST["product_id"];
    $category=$_POST["product_category"];


    echo $name;
    echo $price;
    echo $id;
    echo $category;
}



?>