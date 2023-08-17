
<?php
        session_start();
        
        while(isset($_SESSION['username']))
        {
            require'../navbar2.php';
            
            
            echo"hello ".$_SESSION['username'];
            echo"<br>";
            
    ?>
    <html>
    <title>

    </title>
    <head>

    </head>
    <body>
        <a href="viewprofile.php">view profile</a><br>
        <a href="editprofile.php">edit profile</a><br>
        <a href="changepass.php">change password</a><br>

    </body>
    <?php
        break;}  
    ?>
    <?php
        while(!isset($_SESSION['username']))
        {
            require'../navbar.php';
            echo "youre not logged in";
            break;
        }
        ?>

        