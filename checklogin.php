<?php
    ob_start();
    include("db.php");

    // Define $myusername and $mypassword 
    $myusername=$_POST['user_name']; 
    $mypassword=$_POST['pwd']; 

    // To protect MySQL injection (more detail about MySQL injection)
    //$myusername = stripslashes($myusername);
    $mypassword = stripslashes($mypassword);
    $myusername = mysql_real_escape_string($myusername);
    $mypassword = mysql_real_escape_string($mypassword);
    $encrypted_mypassword=md5($mypassword);
    
    $sql="SELECT * FROM users WHERE user_name='$myusername' and user_pass='$encrypted_mypassword'";
    echo $sql . ' ';
    $result=mysql_query($sql);

    // Mysql_num_row is counting table row
    $count = mysql_num_rows($result);
    echo $count . ' ';
    $zero = 0;

    
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count > $zero)
    {
        session_start();
        $row = mysql_fetch_assoc($result);
        echo $myusername . ' ';
        echo $encrypted_mypassword . ' ';
        echo $row['user_pass'];
        if(strtolower($row['user_name']) == strtolower($myusername))
        {
            if(strtolower($row['user_pass']) == strtolower($encrypted_mypassword))
            {
                echo 'made it';
                $_SESSION['user_name'] = $myusername;
                header('Location: login_success.php');  
            }
        }
        else
        {
            header('Location: login.php?error=Wrong username or password. Please try again.');     
        }
    }
    else
    {
        header('Location: login.php?error=Wrong username or password. Please try again.');     
    }

    ob_end_flush();
?>
