<?php
    session_start();
    include('db.php');

    $title = $_POST['topic_title'];
    $desc = $_POST['topic_desc'];
    $content = "<pre>" . $_POST['content'] . "</pre>";
    $username = $_SESSION['user_name'];
    date_default_timezone_set("UTC");
    $cat = $_GET['cat'];
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO topics (topic_subject, topic_description, topic_date, last_post_date, topic_cat, topic_by) VALUES ('$title', '$desc', '$date', '$date', '$cat', '$username');";
    $result = mysql_query($sql);
    
    $sql = "SELECT * FROM topics WHERE topic_date='$date' and topic_by='$username'";
    $result = mysql_query($sql);
    $num_rows = mysql_num_rows($result);

    if($num_rows == 1)
    {
        $row = mysql_fetch_array($result);
        $topic_id = $row['topic_id'];
        
        $sql = "INSERT INTO posts (post_content, post_date, post_topic, post_by) VALUES ('$content', '$date', '$topic_id', '$username')";
        $result = mysql_query($sql);
        
        header('Location:topic.php?topic=' . $topic_id . '');
    }   
?>