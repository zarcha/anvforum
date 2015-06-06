<html>
    <?php   
        include('db.php');
        include('header.php'); 
    ?>
    
    <body>
        <div class="container">
            <? include('title.php'); ?>
            <div class="row">
                <div class="col-md-9">
                    <?php
                        $sql_forum="SELECT * FROM forums";
                        $result_forum = mysql_query($sql_forum);
                        echo '<div class="panel-group">';
                            while($row = mysql_fetch_array($result_forum))
                            {
                                echo '<div class="panel panel-default">';
                                    echo '<div class="panel-heading">' . $row['forum_name'] . '</div>';
                                    echo '<div class="panel-body">';
                                        echo '<div class="list-group">';
                                            $sql_cat="SELECT * FROM catagories WHERE cat_forum='" . $row['forum_id'] . "'";
                                            $result_cat = mysql_query($sql_cat);
                                            while($row_cat = mysql_fetch_array($result_cat))
                                            {
                                                $sql_topic="SELECT * FROM topics WHERE topic_cat='" . $row_cat['cat_id'] . "'";
                                                $results_topic = mysql_query($sql_topic);
                                                $num_rows_topic = mysql_num_rows($results_topic);
                                                echo '<div class="list-group-item"><span class="badge">Topics: ' . $num_rows_topic . '</span><a href="cat.php?cat=' .
                                                    $row_cat['cat_id'] . '" data-toggle="tooltip" data-placement="right" title="' . $row_cat['cat_description'] . '">' .
                                                    $row_cat['cat_name'] . '</a></div>';
                                                
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            }
                        echo '</div>';
                    ?>
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