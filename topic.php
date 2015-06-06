<html>
    <?php   
        include('db.php');
        include('header.php'); 
    ?>
    
    <body>
        <div class="container">
            <? include('title.php'); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php session_start(); if(isset($_SESSION['user_name'])){ ?>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil"></span> Create Post</button>
                                <br>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <?php
                        $sql_topic = 'SELECT * FROM topics WHERE topic_id="' . $_GET['topic'] . '"';
                        $result_topic = mysql_query($sql_topic);
                        $row_topic = mysql_fetch_array($result_topic);
                        echo '<div class="panel panel-default">';
                            echo '<div class="panel-heading"><a href="cat.php?cat=' . $row_topic['topic_cat'] . '">Back</a><span> /' . $row_topic['topic_subject'] . '</span></div>';
                                echo '<div class="panel-body">';
                                    $sql_post = 'SELECT * FROM posts WHERE post_topic="' . $_GET['topic'] . '" ORDER BY post_date ASC';
                                    $result_post = mysql_query($sql_post);
                                    $num_rows_post = mysql_num_rows($result_post);
                                    for($i = 0; $i < $num_rows_post; $i++)
                                    {
                                        $row_post = mysql_fetch_array($result_post);
                                        echo '<div class="panel panel-default">';
                                            echo '<div class="panel-body">';
                                                echo '<div class="row">';
                                                    echo '<div class="col-md-9 post_content">' . $row_post['post_content'] . '</div>';
                                                    echo '<div class="col-md-3 post_user">';
                                                        $sql_user = 'SELECT * FROM users WHERE user_name="' . $row_post['post_by'] . '"';
                                                        $result_user = mysql_query($sql_user);
                                                        $row_user = mysql_fetch_array($result_user);
                                                        echo '<span class="post_user_name">' . $row_user['user_name'] . '</span>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    ?>
                    <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><span class="glyphicon glyphicon-pencil"></span> Create Post</h4>
                          </div>
                          <div class="modal-body">
                            <?php include("post.php"); ?>
                          </div>
                          <div class="modal-footer">
                          </div>
                        </div>

                      </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php include('sidemenu.php'); ?>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>
    </body>
</html>