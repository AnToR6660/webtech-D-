
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
        <a href="man.php">MAN</a><br>
        <a href="women.php">WOMEN</a><br>
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

        