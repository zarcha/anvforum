<?php
    session_start();
    include('db.php');

    $content = "<pre>" . $_POST['content'] . "</pre>";
    $username = $_SESSION['user_name'];
    date_default_timezone_set("UTC");
    $topic = $_GET['topic'];
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO posts (post_content, post_date, post_topic, post_by) VALUES ('$content', '$date', '$topic', '$username');";
    $result = mysql_query($sql);
    
    $sql = "UPDATE topics SET last_post_date='$date' WHERE topic_id='$topic'";
    $result = mysql_query($sql);

    header('Location:topic.php?topic=' . $topic . '');
?>