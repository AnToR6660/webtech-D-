<?php 
		require 'navbar.php';
?>
<?php
session_start();

if(isset($_SESSION['count'])) {
    $count = $_SESSION['count'];
    
} else {
    $count = 0;
}

if ($count == 1) {
    echo "Thank you for registration!";
} else if ($count == 0) {
    echo "Not registered";
}
?>
