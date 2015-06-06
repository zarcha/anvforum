<?php
    ob_start();
    include("db.php");
    
    // Define $myusername and $mypassword 
    $myusername=$_POST['user_name']; 
    $mypassword=$_POST['pwd']; 
    $myemail=$_POST['email'];

    if($myusername == "" || $myusername == null || $password == null || $mypassword == "")
    {
        header('location:register.php?error=You must fill in all the feilds.');
    }

    // To protect MySQL injection (more detail about MySQL injection)
    $myusername = stripslashes($myusername);
    $mypassword = stripslashes($mypassword);
    //$myemail = stripslashes($myeamil);
    $encrypted_mypassword=md5($mypassword);

    $sql="SELECT * FROM users WHERE user_name='" . $myusername . "'";
    echo $sql . ' ';
    $result=mysql_query($sql);

    // Mysql_num_row is counting table row
    $count = mysql_num_rows($result);
    echo $count . ' ';
    $zero = 0;

    date_default_timezone_set("UTC");
    $date = date('Y-m-d H:i:s');

    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count == 0)
    {
        $sql="INSERT INTO users (user_name, user_pass, user_email, user_date, user_group) VALUES ('$myusername','$encrypted_mypassword','$myemail', '$date', '1')";
        $result = mysql_query($sql);
        
        $sql_a="SELECT * FROM users WHERE user_name='$myusername' and user_pass='$encrypted_mypassword'";
        echo $sql_a . ' ';
        $result=mysql_query($sql_a);

        // Mysql_num_row is counting table row
        $count = mysql_num_rows($result);
        echo $count . ' ';
        $zero = 0;
        
        if($count > 0)
        {
            header('location:login.php?msg=User created. Please login.');
        }
        else{
            header('location:register.php?error=Faild to post account. Pleast try again.' . $sql);
        }
    }
    else
    {
        header('Location:register.php?error=Username already exists');   
    }

    ob_end_flush();
?>