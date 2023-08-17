<?php
  session_start();
        
  while(isset($_SESSION['username']))
  {
      require'../navbar2.php';
  

?>
 <html>
    <title>

    </title>
    <head>

    </head>
    <body>
    <a href="UserProfile.php">Dashboard</a><br>   
   </body>
    <?php  break;}  
    ?>
     <?php
        while(!isset($_SESSION['username']))
        {
            require'../navbar.php';
            echo "youre not logged in";
            break;
        }
        ?>