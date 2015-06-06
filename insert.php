<?php
    include("db.php");

    session_start();
    $username = $_SESSION['username'];
    echo $username . '<br>';

    $title = $_POST['title'];

    $prev_img = $_POST['prev_img'];
    
    $catagory = $_POST['catagory'];

    $topic = $_POST['topic'];

    $type = $_POST['type'];

    $price = $_POST['price'];

    $date = date("y-m-d");

    $sendContent = $_POST["content"];

    $sql="INSERT INTO posts (username, title, topic, catagory, prev_img, price, type, text, date)
    VALUES
    ('$username','$title','$topic','$catagory','$prev_img','$price','$type','$sendContent', '$date')";

    echo $sql;
    
    /*if (!mysql_query($sql))
      {
      die('Error: ' . mysql_error($con));
      }*/

    //header('Location: view_post.php?title=' . $title . '&topic=' . $topic . '&cat=' . $catagory);
    
    //mysqli_close($con);
?>