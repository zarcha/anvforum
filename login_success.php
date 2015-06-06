<?php
    session_start();
    if(isset($_SESSION['user_name'])){
        header('location:index.php');
    }
    else if(!isset($_SESSION['user_name']))
    {
        echo "Not Set";
        header('location:login.php?error=Session could not be set. Please try again.');
    }
?>

<html>
    <body>
        Login Successful
    </body>
</html>