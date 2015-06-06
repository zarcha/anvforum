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
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil"></span> Create Topic</button>
                                <br>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <?php
                        $sql_cat = 'SELECT * FROM catagories WHERE cat_id="' . $_GET['cat'] . '"';
                        $result_cat = mysql_query($sql_cat);
                        $row_cat = mysql_fetch_array($result_cat);
                        echo '<div class="panel panel-default">';
                            echo '<div class="panel-heading">' . $row_cat['cat_name'] . '</div>';
                                echo '<div class="panel-body">';
                                    $sql_topics = 'SELECT * FROM topics WHERE topic_cat="' . $_GET['cat'] . '" ORDER BY last_post_date DESC';
                                    $result_topics = mysql_query($sql_topics);
                                    $num_rows_topics = mysql_num_rows($result_topics);
                                    if($num_rows_topics == 0)
                                    {
                                        echo 'No Topics...';
                                    }
                                    else
                                    {
                                        echo '<div class="list-group">';
                                        for($i = 0; $i < $num_rows_topics; $i++)
                                        {
                                            $row_topics = mysql_fetch_array($result_topics);
                                            $sql_posts = 'SELECT * FROM posts WHERE post_topic="' . $row_topics['topic_id'] . '"';
                                            $result_posts = mysql_query($sql_posts);
                                            $num_rows_posts = mysql_num_rows($result_posts);
                                            
                                                echo '<div class="list-group-item">';
                                                    echo '<span class="badge">Posts: ' . $num_rows_posts . '</span><a href="topic.php?topic=' . $row_topics['topic_id'] . '" class="topic_cat_title" data-toggle="tooltip" data-placement="right" title="' . $row_topics['topic_description'] . '">' . $row_topics['topic_subject'] . '</a><br><span class="topic_last">Last Post: ' . $row_topics['last_post_date'] . '</span>';
                                                echo '</div>';
                                            
                                        }
                                        echo '</div>';
                                    }
                                echo '</div>';
                        echo '</div>';
                    ?>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><span class="glyphicon glyphicon-pencil"></span> Create Topic</h4>
                          </div>
                          <div class="modal-body">
                            <?php include("topicpost.php"); ?>
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