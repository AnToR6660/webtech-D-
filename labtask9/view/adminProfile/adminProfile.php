<?php
        session_start();
        
        while(isset($_SESSION['adminname']))
        {
            require'../navbar2.php';
            
            
            echo"hello ".$_SESSION['adminname'];
            echo"<br>";
            
    ?>
    <html>
    <title>

    </title>
    <head>

    </head>
    <body>
        <a href="editprofile.php">Edit Profile</a><br>
        <a href="UploadProduct.html">Upload Product</a><br>
        <a href="delivery.php">Delivery</a><br>
        <a href="earings.php">Earnings</a><br>
        <a href="inventory.php">Inventory</a><br>
    </body>
    <?php
        break;}  
    ?>
    <?php
        while(!isset($_SESSION['adminname']))
        {
            require'../navbar.php';
            echo "youre not logged in";
            break;
        }
        ?>

        
